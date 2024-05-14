<?php

namespace App\Http\Controllers\Frontend\Faqs;

use App\Models\Ads\Ads;
use App\Models\Faq\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
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
        $faqs = Faq::all();
        return view('frontend.about.faqs',compact(['faqs','bottom_ad']));
    }
}
