<?php

namespace App\Http\Controllers\Frontend\League;

use App\Http\Controllers\Controller;
use App\Models\League\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leagues = League::whereStatus('Active')->with([
                                    'season' => function($season) {
                                        $season->select(['id', 'name']);
                                    },
                                    'sport' => function($sport) {
                                        $sport->select(['id', 'name']);
                                    },
                                    'divisions',
                                    'venues',
                                    'teams'
                                ])->orderBy('start', 'desc')
                                ->get();
        return view('frontend.league.index', compact(['leagues']));
    }
    
    /**
     * API Index.
     */
    public function apiIndex()
    {
        $leagues = League::whereStatus('Active')->with([
                                    'season' => function($season) {
                                        $season->select(['id', 'name']);
                                    },
                                    'sport' => function($sport) {
                                        $sport->select(['id', 'name']);
                                    },
                                    'divisions',
                                    'venues',
                                    'teams'
                                ])->orderBy('start', 'desc')
                                ->get();
        return response()->json(['leagues' => $leagues]);
    }

    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        $league = League::whereId($league->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues',
                            'teams'
                        ])
                        ->firstOrFail();
        return  view('frontend.league.show', compact(['league']));
    }

    /**
     * API Show.
     */
    public function apiShow(League $league)
    {
        $league = League::whereId($league->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues',
                            'teams'
                        ])
                        ->firstOrFail();
        return response()->json(['league' => $league]);
    }
}
