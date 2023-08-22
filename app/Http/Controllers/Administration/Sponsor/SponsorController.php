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
            $avatar = upload_avatar($request, 'avatar');
            $data = $request->all();
            Sponsor::create([
                'name' => $data['name'],
                'avatar' => $avatar,
                'status' => $data['status'],
            ]);
            toast('A New Sponsor Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Sponsor Creation Failed!', 'There is some error! Please fix and try again.', 'error');
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
            dd($e);
            alert('Sponsor Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
