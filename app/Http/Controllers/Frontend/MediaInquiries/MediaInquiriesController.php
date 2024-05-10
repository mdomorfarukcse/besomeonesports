<?php

namespace App\Http\Controllers\Frontend\MediaInquiries;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        try {
            toast('Inquiry Has Been Sent.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            //dd($e);
            alert('Ads Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
