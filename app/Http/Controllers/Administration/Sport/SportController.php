<?php

namespace App\Http\Controllers\Administration\Sport;

use Exception;
use App\Models\Sport\Sport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Exports\Administration\SportsExport;
use App\Imports\Administration\SportsImport;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Http\Requests\Administration\Sport\SportStoreRequest;
use App\Http\Requests\Administration\Sport\SportUpdateRequest;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::select(['id','name','status'])->orderBy('created_at', 'desc')->get();
        return view('administration.sport.index', compact(['sports']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.sport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SportStoreRequest $request)
    {
        //dd($request->all());
        try{
            $sport = new Sport();

            $sport->name = $request->name;
            $sport->description = $request->description;
            $sport->status = $request->status;
            $sport->save();

            toast('A New Sport Has Been Created.', 'success');
            return redirect()->route('administration.sport.index');
        } catch (Exception $e){
            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            alert('Sport Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        return view('administration.sport.show', compact(['sport']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        return view('administration.sport.edit', compact(['sport']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SportUpdateRequest $request, Sport $sport)
    {
        try{
            $sport->name = $request->name;
            $sport->description = $request->description;
            $sport->status = $request->status;
            $sport->save();

            toast('Sport Has Been Updated.', 'success');
            return redirect()->route('administration.sport.show', ['sport' => $sport]);

        } catch (Exception $e){
            //dd($e);
            alert('Sport Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        try {
            $sport->delete();

            toast('Sport Has Been Deleted.','success');
            return redirect()->route('administration.sport.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Sport Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Export all sports
     */
    public function export(){
        $date = date('d_m_Y');
        $fileName = 'sports_'.$date.'.xlsx';
        return Excel::download(new SportsExport, $fileName);
    }

    /**
     * Show the form for importing a new resource.
     */
    public function import()
    {
        return view('administration.sport.import');
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
                Excel::import(new SportsImport, $request->file('csv_file'));
        
                toast('Sports have been successfully imported.', 'success');
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
