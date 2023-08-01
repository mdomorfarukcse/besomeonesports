<?php

namespace App\Http\Controllers\Administration\Sport;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Sport\SportStoreRequest;
use App\Http\Requests\Administration\Sport\SportUpdateRequest;
use App\Models\Sport\Sport;
use Exception;
use Illuminate\Http\Request;

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
            dd($e);
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
            dd($e);
            alert('Sport Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
