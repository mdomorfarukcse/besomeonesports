<?php

namespace App\Http\Controllers\Administration\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('administration.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string',
            'avatar'    => 'required'
        ]);

        try {
            $avatar = upload_image($request->avatar);
            $data = $request->all();
            Partner::create([
                'name' => $data['name'],
                'url' => $data['url'],
                'avatar' => $avatar,
                'status' => $data['status'],
            ]);
            toast('A New Partner Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            //dd($e);
            alert('Partner Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('administration.partner.show', compact(['partner']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('administration.partner.edit', compact(['partner']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        try{
            $partner->name = $request->name;
            $partner->url = $request->url;
            $partner->status = $request->status;
            if (isset($request->avatar)) {
                $avatar = upload_image($request->avatar);
                $partner->avatar = $avatar;
            }
            $partner->save();

            toast('Partner Has Been Updated.', 'success');
            return redirect()->route('administration.partner.show', ['partner' => $partner]);

        } catch (Exception $e){
            //dd($e);
            alert('Partners Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        try {
            $partner->delete();

            toast('Partner Has Been Deleted.','success');
            return redirect()->route('administration.partner.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Partner Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
