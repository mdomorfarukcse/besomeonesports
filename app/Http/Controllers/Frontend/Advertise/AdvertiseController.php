<?php

namespace App\Http\Controllers\Frontend\Advertise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.about.advertise');
    }
}
