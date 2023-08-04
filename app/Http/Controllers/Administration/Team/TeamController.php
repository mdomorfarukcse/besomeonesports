<?php

namespace App\Http\Controllers\Administration\Team;

use Exception;
use App\Models\Team\Team;
use App\Models\Coach\Coach;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Models\Division\Division;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Team\TeamStoreRequest;
use App\Http\Requests\Administration\Team\TeamUpdateRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::with(['event', 'players'])->get();
        // dd($teams);
        return view('administration.team.index', compact(['teams']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $divisions = Division::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $coaches = Coach::select(['id', 'user_id'])->with(['user'])->whereStatus('Active')->get();
        $team_id = $this->generateUniqueID();

        return view('administration.team.create', compact(['events', 'divisions', 'coaches', 'team_id']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamStoreRequest $request)
    {
        // dd($request);
        try{           
            $team = new Team();

            $team->team_id = $request->team_id;
            $team->event_id = $request->event_id;
            $team->division_id = $request->division_id;
            $team->coach_id = $request->coach_id;
            $team->name = $request->name;
            $team->gender = $request->gender;
            $team->maximum_players = $request->maximum_players;
            $team->status = $request->status;
            $team->description = $request->description;
            $team->save();

            toast('A New Team Has Been Created.', 'success');
            return redirect()->route('administration.team.index');
        } catch (Exception $e){

            dd($e);
            alert('Team Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        dd($team);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        dd($team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        dd($team);
    }


    // Generate a unique ID with a minimum and maximum length of 10 characters
    private function generateUniqueID() {
        $length = 10;
        $timestampLength = 13; // Length of the timestamp in milliseconds
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Get the current timestamp in milliseconds
        $timestamp = round(microtime(true) * 1000);
    
        // Convert the timestamp to a string and remove the decimal point
        $timestampString = str_replace('.', '', (string)$timestamp);
    
        // Calculate the number of characters needed to fill the remaining length
        $charactersNeeded = $length - $timestampLength;
    
        // Ensure we have enough characters to fill the length
        while (strlen($timestampString) < $charactersNeeded) {
            $randomCharacter = $characters[random_int(0, strlen($characters) - 1)];
            $timestampString .= $randomCharacter;
        }
    
        // Convert the timestamp to all capital letters
        $timestampString = strtoupper($timestampString);
    
        // Combine the timestamp with the random characters and take the first $length characters
        $uniqueID = substr($timestampString, 0, $length);
    
        return $uniqueID;
    }
}
