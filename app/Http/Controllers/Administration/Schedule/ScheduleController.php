<?php

namespace App\Http\Controllers\Administration\Schedule;

use Exception;
use App\Models\Court\Court;
use App\Models\Event\Event;
use App\Models\Venue\Venue;
use Illuminate\Http\Request;
use App\Models\Schedule\Schedule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('administration.schedule.index', compact(['schedules']));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function calender()
    {
        return view('administration.schedule.calender');
    }

    /**
     * Display a listing of the resource.
     */
    public function get_calender_data()
    {
        $calender_data = array();
        $schedules = Schedule::all();
        foreach($schedules as $schedule){
            $title = $schedule->teams[0]->name.' Vs '.$schedule->teams[1]->name;
            $start = $schedule->date.' '.$schedule->start;
            $end = $schedule->date.' '.$schedule->end;
            $calender_data[] = [
                 'event_name' => $schedule->event->name,
                 'venue_name' => $schedule->venue->name,
                 'court_name' => $schedule->court->name,
                 'title' => $title,
                 'start' => $start,
                 'end' => $end
            ];
        }
        return response()->json($calender_data);
    }

    /**
     * Display a listing of the resource.
     */
    public function get_calender(Schedule $schedule)
    {
        $calender_data = array();
        $schedule = Schedule::whereId($schedule->id)->firstOrFail();

        $title = $schedule->teams[0]->name.' Vs '.$schedule->teams[1]->name;
        $start = $schedule->date.' '.$schedule->start;
        $end = $schedule->date.' '.$schedule->end;
        $calender_data[] = [
                'title' => $title,
                'start' => $start,
                'end' => $end
        ];
        return response()->json($calender_data);
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
        // dd($request->all());
        try {
            DB::transaction(function() use ($request) {
                $schedule = new Schedule();
                $schedule->event_id = $request->event_id;
                $schedule->venue_id = $request->venue_id;
                $schedule->court_id = $request->court_id;
                $schedule->date = $request->date;
                $schedule->start = $request->start;
                $schedule->end = $request->end;
                $schedule->save();

                // Attach teams to the schedule
                $schedule->teams()->attach($request->teams);
            }, 5);

            toast('Schedule created successfully.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Failed to create the schedule.', 'There is some error! Please fix and try again.', 'error');
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
