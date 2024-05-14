<?php

namespace App\Http\Controllers\Frontend\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Schedule\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.schedule.index');
    }
    
    /**
     * API Index.
     */
    public function apiIndex()
    {
        $schedules = Schedule::whereStatus('Active')->get();
        return response()->json(['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * API Show.
     */
    public function apiShow(Schedule $schedule)
    {
        return response()->json(['schedule' => $schedule]);
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
