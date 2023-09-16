<?php

namespace App\Http\Controllers\Frontend\Press;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\Http\Request;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $press = News::whereStatus('Active')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.press.index', compact(['press']));
    }
    /**
     * Display the specified resource.
     */
    public function show(News $press)
    {
        $press = News::whereId($press->id)->firstOrFail();  
        $all_press = News::whereStatus('Active')->orderBy('created_at', 'desc')->limit(3)->get();  
        return  view('frontend.press.show', compact(['press','all_press']));
    }
}
