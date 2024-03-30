<?php

namespace App\Http\Controllers\Frontend\Gallery;

use App\Models\Video\Video;
use Illuminate\Http\Request;
use App\Models\Gallery\Gallery;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        $videos = Video::whereStatus('Active')->get();
        return view('frontend.gallery.index', compact(['galleries', 'videos']));
    }
}
