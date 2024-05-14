<?php

namespace App\Http\Controllers\Frontend\OurTeam;

use App\Models\Ads\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurTeamController extends Controller
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
        return view('frontend.about.ourteam', compact(['bottom_ad']));
    }
}
