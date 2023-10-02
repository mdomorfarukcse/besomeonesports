<?php

namespace App\Http\Controllers\Frontend\Appinfo;

use App\Models\Ads\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppinfoController extends Controller
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
        return view('frontend.about.app-info', compact(['bottom_ad']));
    }
}
