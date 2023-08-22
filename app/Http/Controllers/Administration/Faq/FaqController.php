<?php

namespace App\Http\Controllers\Administration\Faq;

use App\Http\Controllers\Controller;
use App\Models\Faq\Faq;
use Exception;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('administration.faq.index', compact(['faqs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string'
        ]);
        try {
            $data = $request->all();
            Faq::create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
            toast('A New Faqs Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            dd($e);
            alert('Faq Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return view('administration.faq.show', compact(['faq']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('administration.faq.edit', compact(['faq']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string'
        ]);
        try {
            $faq->update($request->all());
            toast('Faq Has Been Updated.', 'success');
            return redirect()->route('administration.faq.show', ['faq' => $faq]);
        } catch (Exception $e){
            dd($e);
            alert('Faq update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();

            toast('Faq Has Been Deleted.','success');
            return redirect()->route('administration.faq.index');
        } catch (Exception $e) {
            dd($e);
            alert('Faq Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
