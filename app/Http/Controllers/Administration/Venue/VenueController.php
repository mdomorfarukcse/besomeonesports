<?php

namespace App\Http\Controllers\Administration\Venue;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        //dd($request->all());

        try{
           
            $venue = new Venue();

            $venue->name = $request->name;
            $venue->street = $request->street;
            $venue->city = $request->city;
            $venue->state = $request->state;
            $venue->postal_code = $request->postal_code;
            $venue->latitude = $request->latitude;
            $venue->longitude = $request->longitude;
            $venue->status = $request->status;
            $venue->save();

            toast('A New Venue Has Been Created.', 'success');
            return redirect()->route('administration.venue.index');

        } catch (Exception $e){

            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            alert('Venue Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
