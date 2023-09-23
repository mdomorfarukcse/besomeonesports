<?php

namespace App\Http\Controllers\Frontend\Mission;

use App\Http\Controllers\Controller;
use App\Models\League\League;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcomingLeagues = League::whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();
        return view('frontend.about.mission', compact(['upcomingLeagues']));
    }
}
