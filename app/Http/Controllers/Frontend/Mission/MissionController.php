<?php

namespace App\Http\Controllers\Frontend\Mission;

use App\Models\Ads\Ads;
use App\Models\League\League;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString(); 
        $upcomingLeagues = League::whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                                ->whereDate('enddate', '>=', $today)
                                ->wherePosition('aboutpages')
                                ->whereStatus('Active')
                                ->inRandomOrder()
                                ->first();
        return view('frontend.about.mission', compact(['upcomingLeagues','bottom_ad']));
    }
}
