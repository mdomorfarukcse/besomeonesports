<?php

namespace App\Http\Controllers\Administration\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Court\Court;
use App\Models\Event\Event;
use App\Models\Venue\Venue;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administration.schedule.index');
    }

    public function teams(Request $request, $event) {
        $teams = Event::findOrFail($event)->teams;

        return response()->json($teams);
    }

    public function venues(Request $request, $event) {
        $venues = Event::findOrFail($event)->venues;

        return response()->json($venues);
    }

    public function courts(Request $request, $venue) {
        $courts = Venue::findOrFail($venue)->courts;

        return response()->json($courts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::select(['id', 'name', 'status'])
                        ->with([
                            'teams', 
                            'venues' => function($venue) {
                                $venue->with(['courts']);
                            }
                        ])
                        ->whereStatus('Active')
                        ->get();
                        
        return view('administration.schedule.create', compact(['events']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
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
