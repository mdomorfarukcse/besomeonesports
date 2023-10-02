<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Models\Ads\Ads;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('blog')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $blogs = Blog::whereStatus('Active')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.blog.index', compact(['blogs','bottom_ad']));
    }
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('blog')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $blog = Blog::whereId($blog->id)->firstOrFail();  
        $all_blog = Blog::whereStatus('Active')->orderBy('created_at', 'desc')->limit(3)->get();  
        return  view('frontend.blog.show', compact(['blog','all_blog','bottom_ad']));
    }
}
