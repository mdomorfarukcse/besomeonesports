<?php

namespace App\Http\Controllers\Frontend\MediaInquiries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaInquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.MediaInquiries.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
