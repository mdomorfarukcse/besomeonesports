<?php

namespace App\Http\Controllers\Frontend\Sponsors;

use App\Http\Controllers\Controller;
use App\Models\Sponsor\Sponsor;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $sponsors = Sponsor::all();
        return view('frontend.sponsors.index', compact(['sponsors']));
    }
}
