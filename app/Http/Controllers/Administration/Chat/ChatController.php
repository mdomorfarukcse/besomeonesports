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
            $teams = Team::with(['league', 'players', 'messages' => function ($query) {
                                $query->orderBy('created_at', 'desc');
                            }])
                            ->whereCoachId(Auth::user()->coach->id)
                            ->whereStatus('Active')
                            ->orderByDesc(function ($subquery) {
                                $subquery->select('created_at')
                                    ->from('messages')
                                    ->whereColumn('messages.team_id', 'teams.id')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(1);
                            })
                            ->get()
                            ->filter(function ($team) {
                                return $team->status === 'Active';
                            });
        } elseif (Auth::user()->hasRole('player')) {
            $player = Player::with('teams')->whereId(Auth::user()->player->id)->firstOrFail();

            $teams = $player->teams()
                            ->with(['league', 'players', 'messages' => function ($query) {
                                $query->orderBy('created_at', 'desc');
                            }])
                            ->whereStatus('Active')
                            ->orderByDesc(function ($subquery) {
                                $subquery->select('created_at')
                                    ->from('messages')
                                    ->whereColumn('messages.team_id', 'teams.id')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(1);
                            })
                            ->get()
                            ->filter(function ($team) {
                                return $team->status === 'Active';
                            });
        } else {
            $teams = Team::with(['league', 'players', 'messages' => function ($query) {
                                $query->orderBy('created_at', 'desc');
                            }])
                            ->whereStatus('Active')
                            ->orderByDesc(function ($subquery) {
                                $subquery->select('created_at')
                                    ->from('messages')
                                    ->whereColumn('messages.team_id', 'teams.id')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(1);
                            })
                            ->get();
        }
        
          
        return view('administration.chat.index', compact(['teams']));
    }
    
    
    /**
     * API Index.
     */
    public function apiIndex()
    {
        if (Auth::user()->hasRole('coach')) {
            $teams = Team::with(['league', 'players', 'messages' => function ($query) {
                                $query->orderBy('created_at', 'desc');
                            }])
                            ->whereCoachId(Auth::user()->coach->id)
                            ->whereStatus('Active')
                            ->orderByDesc(function ($subquery) {
                                $subquery->select('created_at')
                                    ->from('messages')
                                    ->whereColumn('messages.team_id', 'teams.id')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(1);
                            })
                            ->get()
                            ->filter(function ($team) {
                                return $team->status === 'Active';
                            });
        } elseif (Auth::user()->hasRole('player')) {
            $player = Player::with('teams')->whereId(Auth::user()->player->id)->firstOrFail();

            $teams = $player->teams()
                            ->with(['league', 'players', 'messages' => function ($query) {
                                $query->orderBy('created_at', 'desc');
                            }])
                            ->whereStatus('Active')
                            ->orderByDesc(function ($subquery) {
                                $subquery->select('created_at')
                                    ->from('messages')
                                    ->whereColumn('messages.team_id', 'teams.id')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(1);
                            })
                            ->get()
                            ->filter(function ($team) {
                                return $team->status === 'Active';
                            });
        } else {
            $teams = Team::with(['league', 'players', 'messages' => function ($query) {
                                $query->orderBy('created_at', 'desc');
                            }])
                            ->whereStatus('Active')
                            ->orderByDesc(function ($subquery) {
                                $subquery->select('created_at')
                                    ->from('messages')
                                    ->whereColumn('messages.team_id', 'teams.id')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(1);
                            })
                            ->get();
        }
        
          
        return response()->json(['teams' => $teams]);
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
     * API Store.
     */
    public function apiStore(Request $request)
    {
        $message = new Message();
        $message->team_id = $request->team_id;
        $message->user_id = auth()->user()->id;
        $message->message = $request->message;
        $message->save();

        $messages = Team::findOrFail($request->team_id)->messages;;
        return response()->json(['messages' => $messages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function imageupload(Request $request)
    {
        
        $avatar = upload_image($request->avatar);
        $message = new Message();
        $message->team_id = $request->team_id;
        $message->user_id = auth()->user()->id;
        $message->message = $avatar;
        $message->type = 'image';
        $message->save();

        $messages = Team::findOrFail($request->team_id)->messages;;
        return view('administration.chat.messages', compact(['messages']));
    }


    /**
     * API Image Upload.
     */
    public function apiImageupload(Request $request)
    {
        
        $avatar = upload_image($request->avatar);
        $message = new Message();
        $message->team_id = $request->team_id;
        $message->user_id = auth()->user()->id;
        $message->message = $avatar;
        $message->type = 'image';
        $message->save();

        $messages = Team::findOrFail($request->team_id)->messages;;
        return response()->json(['messages' => $messages]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team){
        $messages = $team->messages;
        return view('administration.chat.messages', compact(['messages']));
    }

    /**
     * API Message Show
     */
    public function apiShow(Team $team){
        $messages = $team->messages;
        return response()->json(['messages' => $messages]);
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
