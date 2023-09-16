<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::whereStatus('Active')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.blog.index', compact(['blogs']));
    }
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog = Blog::whereId($blog->id)->firstOrFail();  
        $all_blog = Blog::whereStatus('Active')->orderBy('created_at', 'desc')->limit(3)->get();  
        return  view('frontend.blog.show', compact(['blog','all_blog']));
    }
}
