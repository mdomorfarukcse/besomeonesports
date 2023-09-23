<?php

namespace App\Http\Controllers\Administration\Ads;

use App\Http\Controllers\Controller;
use App\Models\Ads\Ads;
use Exception;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ads::all();
        return view('administration.ads.index', compact(['ads']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'url' => 'required',
            'position' => 'required',
            'avatar' => 'required',
            'startdate' => 'required',
            'enddate' => 'required'
        ]);
        try {
            $avatar = upload_image($request, 'avatar');
            $data = $request->all();
            Ads::create([
                'name' => $data['name'],
                'position' => $data['position'],
                'avatar' => $avatar,
                'status' => $data['status'],
                'startdate' => $data['startdate'],
                'enddate' => $data['enddate'],
                'url' => $data['url'],
            ]);
            toast('A New Ads Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            dd($e);
            alert('Ads Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ads $ads)
    {
        return view('administration.ads.show', compact(['ads']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ads $ads)
    {
        return view('administration.ads.edit', compact(['ads']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ads $ads)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'url' => 'required',
            'position' => 'required',
            'startdate' => 'required',
            'enddate' => 'required'
        ]);
        try {
            $ads->name = $request->name;
            $ads->url = $request->url;
            $ads->position = $request->position;
            $ads->startdate = $request->startdate;
            $ads->enddate = $request->enddate;
            $ads->description = $request->description;
            $ads->status = $request->status;
            if (isset($request->avatar)) {
                $avatar = upload_image($request, 'avatar');
                $ads->avatar = $avatar;
            }
            $ads->save();
            toast('Ads Has Been Updated.', 'success');
            return redirect()->route('administration.ads.show', ['ads' => $ads]);
        } catch (Exception $e){
            dd($e);
            alert('Ads update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ads $ads)
    {
        try {
            $ads->delete();

            toast('Ads Has Been Deleted.','success');
            return redirect()->route('administration.ads.index');
        } catch (Exception $e) {
            dd($e);
            alert('Ads Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
