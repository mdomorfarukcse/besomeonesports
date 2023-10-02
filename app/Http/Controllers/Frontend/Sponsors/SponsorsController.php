<?php

namespace App\Http\Controllers\Frontend\Sponsors;

use App\Models\Ads\Ads;
use Illuminate\Http\Request;
use App\Models\Sponsor\Sponsor;
use App\Http\Controllers\Controller;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('sponsor')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $sponsors = Sponsor::all();
        return view('frontend.sponsors.index', compact(['sponsors','bottom_ad']));
    }
}
