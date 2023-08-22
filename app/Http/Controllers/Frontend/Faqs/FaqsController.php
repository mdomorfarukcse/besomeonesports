<?php

namespace App\Http\Controllers\Frontend\Faqs;

use App\Http\Controllers\Controller;
use App\Models\Faq\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('frontend.about.faqs',compact(['faqs']));
    }
}
