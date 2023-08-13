<?php

namespace App\Http\Controllers\Frontend\OurTeam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.about.ourteam');
    }
}
