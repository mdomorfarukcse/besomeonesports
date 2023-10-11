<?php

namespace App\Http\Controllers\Administration\Schedule;

use Exception;
use App\Models\League\League;
use App\Models\Venue\Venue;
use Illuminate\Http\Request;
use App\Models\Schedule\Schedule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Schedule\ScheduleStoreRequest;
use App\Models\Round\Round;

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
                 'schedule_id' => $schedule->id,
                 'league_name' => $schedule->league->name,
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

    public function referees(Request $request, $league) {
        $referees = League::findOrFail($league)->referees;

        return response()->json($referees);
    }

    public function rounds(Request $request, $league) {
        $rounds = League::findOrFail($league)->rounds;

        return response()->json($rounds);
    }

    public function teams(Request $request, $league) {
        $teams = League::findOrFail($league)->teams;

        return response()->json($teams);
    }

    public function venues(Request $request, $league) {
        $venues = League::findOrFail($league)->venues;

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
        $leagues = League::select(['id', 'name', 'status'])
                        ->with([
                            'referees', 
                            'teams', 
                            'venues' => function($venue) {
                                $venue->with(['courts']);
                            }
                        ])
                        ->whereStatus('Active')
                        ->has('teams', '>=', 2)
                        ->get();
                        
        return view('administration.schedule.create', compact(['leagues']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleStoreRequest $request)
    {
        // dd($request->all());
        try {
            DB::transaction(function() use ($request) {
                $schedule = new Schedule();
                $schedule->league_id = $request->league_id;
                $schedule->referee_id = $request->referee_id;
                $schedule->round_id = $request->round_id;
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
    public function show(Schedule $schedule)
    {
        return view('administration.schedule.show', compact(['schedule']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        // dd($schedule->referee);
        $leagues = League::select(['id', 'name', 'status'])
                        ->with([
                            'referees', 
                            'teams', 
                            'venues' => function($venue) {
                                $venue->with(['courts']);
                            }
                        ])
                        ->whereStatus('Active')
                        ->has('teams', '>=', 2)
                        ->get();
        return view('administration.schedule.edit', compact(['schedule','leagues']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        // dd($request->all(),$schedule->teams);
        try {
            DB::transaction(function() use ($request, $schedule) {
                $schedule->league_id = $request->league_id;
                $schedule->referee_id = $request->referee_id;
                $schedule->round_id = $request->round_id;
                $schedule->venue_id = $request->venue_id;
                $schedule->court_id = $request->court_id;
                $schedule->date = $request->date;
                $schedule->start = $request->start;
                $schedule->end = $request->end;
                $schedule->save();

                // Attach teams to the schedule
                $schedule->teams()->sync($request->teams);
            }, 5);

            toast('Schedule updated successfully.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Failed to update the schedule.', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        try {
            $schedule->delete();

            toast('Schedule Has Been Deleted.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Schedule Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }


    public function resultUpdate(Request $request, Schedule $schedule) {
        $request->validate([
            'score' => 'required|array',
            'score.*' => 'required|numeric|min:0',
        ]);
        if ($request->winner != 'Draw') {
            $request->validate([
                'winner' => 'required|integer|exists:teams,id',
            ]);
        }
        // dd($request->all(), $schedule);

        
        try {
            DB::transaction(function() use ($request, $schedule) {
                // Update the scores for teams in the pivot table
                foreach ($request->input('score') as $teamId => $teamScore) {
                    $schedule->teams()->updateExistingPivot($teamId, ['score' => $teamScore]);
                }

                if ($request->winner != 'Draw') {
                    $schedule->team_id = $request->winner;
                }
                $schedule->status = 'Completed';
                $schedule->save();
            }, 5);

            toast('Result updated successfully.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Failed to update the Result.', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
