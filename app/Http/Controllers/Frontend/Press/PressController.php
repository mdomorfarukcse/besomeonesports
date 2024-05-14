<?php

namespace App\Http\Controllers\Frontend\Press;

use App\Models\Ads\Ads;
use App\Models\News\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('news')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $press = News::whereStatus('Active')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.press.index', compact(['press','bottom_ad']));
    }
    /**
     * Display the specified resource.
     */
    public function show(News $press)
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('news')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $press = News::whereId($press->id)->firstOrFail();  
        $all_press = News::whereStatus('Active')->orderBy('created_at', 'desc')->limit(3)->get();  
        return  view('frontend.press.show', compact(['press','all_press','bottom_ad']));
    }
}
