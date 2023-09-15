<?php

namespace App\Http\Controllers\Administration\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery\Gallery;
use Exception;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('administration.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.gallery.create');
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
            Gallery::create([
                'name' => $data['name'],
                'avatar' => $avatar,
                'status' => $data['status'],
            ]);
            toast('A New Gallery Image Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Gallery Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        try {
            $gallery->delete();

            toast('Gallery Has Been Deleted.','success');
            return redirect()->route('administration.sponsor.index');
        } catch (Exception $e) {
            dd($e);
            alert('Gallery Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
