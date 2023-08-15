<?php

namespace App\Http\Controllers\Frontend\Sponsors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.sponsors.index');
    }
}
