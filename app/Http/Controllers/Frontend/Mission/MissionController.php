<?php

namespace App\Http\Controllers\Frontend\Mission;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcomingEvents = Event::whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();
        return view('frontend.about.mission', compact(['upcomingEvents']));
    }
}
