<?php

namespace App\Http\Controllers\Administration\Sponsor;

use App\Http\Controllers\Controller;
use App\Models\Sponsor\Sponsor;
use Exception;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('administration.sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.sponsor.create');
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
            Sponsor::create([
                'name' => $data['name'],
                'url' => $data['url'],
                'avatar' => $avatar,
                'status' => $data['status'],
            ]);
            toast('A New Sponsor Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            //dd($e);
            alert('Sponsor Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        return view('administration.sponsor.show', compact(['sponsor']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        return view('administration.sponsor.edit', compact(['sponsor']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        try{
            $sponsor->name = $request->name;
            $sponsor->url = $request->url;
            $sponsor->status = $request->status;
            if (isset($request->avatar)) {
                $avatar = upload_image($request->avatar);
                $sponsor->avatar = $avatar;
            }
            $sponsor->save();

            toast('Sponsor Has Been Updated.', 'success');
            return redirect()->route('administration.sponsor.show', ['sponsor' => $sponsor]);

        } catch (Exception $e){
            //dd($e);
            alert('Sponsors Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        try {
            $sponsor->delete();

            toast('Sponsor Has Been Deleted.','success');
            return redirect()->route('administration.sponsor.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Sponsor Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
