<?php

namespace App\Http\Controllers\Frontend\Contact;

use Exception;
use Illuminate\Http\Request;
use App\Models\Contact\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(Request $request) {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'message' => 'required|string',
            'interested_in' => 'required|array',
            'interested_in.*' => 'string', // Validate each element in the array
            'location' => 'required|array',
            'location.*' => 'string', // Validate each element in the array
        ]);
    
        try {
            Contact::create([
                'form_type' => $request->form_type,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'interested_in' => json_encode($request->interested_in),
                'location' => json_encode($request->location),
            ]);

            toast('Your Message Has Been Sent.','success');
            return redirect()->back();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function apiStore(Request $request) {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'message' => 'required|string',
            'interested_in' => 'required|array',
            'interested_in.*' => 'string',
            'location' => 'required|array',
            'location.*' => 'string',
        ]);
        // dd($request->all());
    
        try {
            $contact = Contact::create([
                'form_type' => $request->form_type,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'interested_in' => json_encode($request->interested_in),
                'location' => json_encode($request->location),
            ]);

            return response()->json(['contact' => $contact]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Message Sent Failed! There is some error! The Error is: ' . $e->getMessage()]);
        }
    }
}
