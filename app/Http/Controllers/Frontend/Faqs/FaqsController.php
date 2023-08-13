<?php

namespace App\Http\Controllers\Frontend\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.about.faqs');
    }
}
