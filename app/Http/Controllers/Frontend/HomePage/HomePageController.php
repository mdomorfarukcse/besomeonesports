<?php

namespace App\Http\Controllers\Frontend\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    function index() {
        return view('frontend.homepage.index');
    }
}
