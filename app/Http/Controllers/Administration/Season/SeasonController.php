<?php

namespace App\Http\Controllers\Administration\Season;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Season\SeasonStoreRequest;
use App\Http\Requests\Administration\Season\SeasonUpdateRequest;
use App\Models\Season\Season;
use Exception;
use Illuminate\Http\Request;

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
            dd($e);
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
            dd($e);
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
            dd($e);
            alert('Season Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
