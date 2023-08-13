<?php

namespace App\Http\Controllers\Frontend\Appinfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.about.app-info');
    }
}
