<?php

namespace App\Http\Controllers\Frontend\Press;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.press.index');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('frontend.press.show');
    }
}
