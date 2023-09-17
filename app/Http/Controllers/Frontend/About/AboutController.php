<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcomingEvents = Event::whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();
        return view('frontend.about.index', compact(['upcomingEvents']));
    }
}
