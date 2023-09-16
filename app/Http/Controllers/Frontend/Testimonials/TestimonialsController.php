<?php

namespace App\Http\Controllers\Frontend\Testimonials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.testimonial.index');
    }
}
