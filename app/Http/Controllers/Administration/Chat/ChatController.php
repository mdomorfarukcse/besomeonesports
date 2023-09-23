<?php

namespace App\Http\Controllers\Administration\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message\Message;
use App\Models\Player\Player;
use App\Models\Team\Team;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('coach')) {
            $teams = Team::with(['league', 'players'])->whereCoachId(Auth::user()->coach->id)->get();
        } elseif (Auth::user()->hasRole('player')) {
            $player = Player::with('teams')->whereId(Auth::user()->player->id)->firstOrFail();

            $teams = $player->teams;
        } else {
            $teams = Team::with(['league', 'players'])->whereStatus('Active')->get();
        }
        
          
        return view('administration.chat.index', compact(['teams']));
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
        $message = new Message();
        $message->team_id = $request->team_id;
        $message->user_id = auth()->user()->id;
        $message->message = $request->message;
        $message->save();

        $messages = Team::findOrFail($request->team_id)->messages;;
        return view('administration.chat.messages', compact(['messages']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team){
        $messages = $team->messages;
        return view('administration.chat.messages', compact(['messages']));
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
