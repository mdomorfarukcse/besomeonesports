<?php

namespace App\Http\Controllers\Frontend\Partners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.partners.index');
    }

    
}
