<?php

namespace App\Http\Controllers\Administration\Season;

use Exception;
use Illuminate\Http\Request;
use App\Models\Season\Season;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Exports\Administration\SeasonExport;
use App\Imports\Administration\SeasonImport;
use App\Exports\Administration\SeasonsExport;
use App\Imports\Administration\SeasonsImport;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Http\Requests\Administration\Season\SeasonStoreRequest;
use App\Http\Requests\Administration\Season\SeasonUpdateRequest;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seasons = Season::select(['id','name','year','start','end','status'])->orderBy('created_at', 'desc')->get();
        return view('administration.season.index', compact(['seasons']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.season.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeasonStoreRequest $request)
    {
        //dd($request->all());

        try{
            $season = new Season();

            $season->name = $request->name;
            $season->year = $request->year;
            $season->start = $request->start;
            $season->end = $request->end;
            $season->status = $request->status;
            $season->save();

            toast('A New Season Has Been Created.', 'success');
            return redirect()->route('administration.season.index');

        } catch (Exception $e){
            //dd($e);
            alert('Season Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        return view('administration.season.show', compact(['season']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        return view('administration.season.edit', compact(['season']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeasonUpdateRequest $request, Season $season)
    {
        try{
            $season->name = $request->name;
            $season->year = $request->year;
            $season->start = $request->start;
            $season->end = $request->end;
            $season->status = $request->status;
            $season->save();

            toast('Season Has Been Updated.', 'success');
            return redirect()->route('administration.season.show', ['season' => $season]);

        } catch (Exception $e){
            //dd($e);
            alert('Season Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        try {
            $season->delete();

            toast('Season Has Been Deleted.','success');
            return redirect()->route('administration.season.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Season Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Export all sports
     */
    public function export(){
        $date = date('d_m_Y');
        $fileName = 'seasons_'.$date.'.xlsx';
        return Excel::download(new SeasonsExport, $fileName);
    }

    /**
     * Show the form for importing a new resource.
     */
    public function import()
    {
        return view('administration.season.import');
    }

    /**
     * import csv file
     */
    public function importCsv(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt'
        ],[
            'csv_file.mimes' => 'The uploaded file is not in .csv format. Please upload .csv file.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                Excel::import(new SeasonsImport, $request->file('csv_file'));
        
                toast('Seasons have been successfully imported.', 'success');
                return redirect()->route('administration.sport.index');
            } catch (ValidationException $excel_validation_error) {
                // Handle validation exceptions using the helper function
                return show_csv_import_validation_errors($excel_validation_error);
            } catch (\Exception $error) {
                // Handle other exceptions
                return redirect()->back()->withErrors($error->getMessage());
            }
        }
    }
}
