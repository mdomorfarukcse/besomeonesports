<?php

namespace App\Http\Controllers\Administration\Contact;

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
        $contacts = Contact::orderByDesc('created_at')->get();
        return view('administration.contact.index', compact(['contacts']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('administration.contact.show', compact(['contact']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();

            toast('Contact Message Has Been Deleted.','success');
            return redirect()->route('administration.contact.index');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            return redirect()->back();
        }
    }
}
