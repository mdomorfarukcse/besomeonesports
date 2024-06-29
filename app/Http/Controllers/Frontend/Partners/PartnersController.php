<?php

namespace App\Http\Controllers\Frontend\Partners;

use App\Http\Controllers\Controller;
use App\Models\Ads\Ads;
use App\Models\Partner\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('partner')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $partners = Partner::all();
        return view('frontend.partners.index', compact(['partners','bottom_ad']));
    }

    
}
