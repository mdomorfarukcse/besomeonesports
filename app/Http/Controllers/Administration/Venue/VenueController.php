<?php

namespace App\Http\Controllers\Administration\Venue;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Venue\VenueStoreRequest;
use App\Http\Requests\Administration\Venue\VenueUpdateRequest;
use App\Models\Venue\Venue;
use Exception;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $venues = Venue::select(['id','name','street','city','state','postal_code','status'])->orderBy('created_at', 'desc')->get();
        return view('administration.venue.index', compact(['venues']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.venue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueStoreRequest $request)
    {
        try{
            $venue = new Venue();

            $venue->name = $request->name;
            $venue->street = $request->street;
            $venue->city = $request->city;
            $venue->state = $request->state;
            $venue->postal_code = $request->postal_code;
            $venue->status = $request->status;
            $venue->save();

            toast('A New Venue Has Been Created.', 'success');
            return redirect()->route('administration.venue.index');
        } catch (Exception $e){
            //dd($e);
            alert('Venue Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        return view('administration.venue.show', compact(['venue']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        return view('administration.venue.edit', compact(['venue']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VenueUpdateRequest $request, Venue $venue)
    {
        try{
            $venue->name = $request->name;
            $venue->street = $request->street;
            $venue->city = $request->city;
            $venue->state = $request->state;
            $venue->postal_code = $request->postal_code;
            $venue->status = $request->status;
            $venue->save();

            toast('Venue Has Been Updated.', 'success');
            return redirect()->route('administration.venue.show', ['venue' => $venue]);
        } catch (Exception $e){
            //dd($e);
            alert('Venue Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        try {
            $venue->delete();

            toast('Venue Has Been Deleted.','success');
            return redirect()->route('administration.venue.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Venue Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
