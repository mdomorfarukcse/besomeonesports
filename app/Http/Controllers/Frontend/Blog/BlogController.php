<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.blog.index');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('frontend.blog.show');
    }
}
