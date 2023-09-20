<?php

namespace App\Http\Controllers\Administration\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            $teams = Team::with(['event', 'players'])->whereCoachId(Auth::user()->coach->id)->get();
        } elseif (Auth::user()->hasRole('player')) {
            $player = Player::with('teams')->whereId(Auth::user()->player->id)->firstOrFail();

            $teams = $player->teams;
        } else {
            $teams = Team::with(['event', 'players'])->whereStatus('Active')->get();
        }
        
          
        return view('administration.chat.index', compact(['teams']));
    }

    public function get_messages(){
        $messages = [
            [
                'id' => 1,
                'sender' => 'John',
                'message' => 'Hello, how are you?',
                'timestamp' => '2023-09-20 10:00:00',
            ],
            [
                'id' => 2,
                'sender' => 'Alice',
                'message' => 'Test',
                'message' => 'Test',
                'timestamp' => '2023-09-20 10:05:00',
            ],
        ];

        return view('administration.chat.get_messages', compact(['messages']));
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
