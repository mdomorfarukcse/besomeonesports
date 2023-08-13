<?php

namespace App\Http\Controllers\Frontend\Mission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.about.mission');
    }
}
