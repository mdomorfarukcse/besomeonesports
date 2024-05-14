<?php

namespace App\Http\Controllers\Frontend\About;

use App\Models\Ads\Ads;
use Illuminate\Http\Request;
use App\Models\League\League;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('aboutpages')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $upcomingLeagues = League::whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();
        return view('frontend.about.index', compact(['upcomingLeagues','bottom_ad']));
    }
}
