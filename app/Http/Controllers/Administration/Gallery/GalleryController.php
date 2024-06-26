<?php

namespace App\Http\Controllers\Administration\Gallery;

use Exception;
use App\Models\Sport\Sport;
use Illuminate\Http\Request;
use App\Models\League\League;
use App\Models\Season\Season;
use App\Models\Gallery\Gallery;
use App\Http\Controllers\Controller;

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
        $leagues = League::select(['id','name'])
                        ->whereStatus('Active')
                        ->orderBy('created_at', 'desc')
                        ->get();
        $sports = Sport::select(['id','name'])
                        ->whereStatus('Active')
                        ->orderBy('created_at', 'desc')
                        ->get();
        $seasons = Season::select(['id','name'])
                        ->whereStatus('Active')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('administration.gallery.create', compact('leagues', 'sports', 'seasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'league_id' => ['nullable'],
            'sport_id' => ['nullable'],
            'season_id' => ['nullable'],
            'images' => ['required', 'array'],
            'images.*' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:2048']
        ]);

        try {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // Use the upload_image function to upload each image to the "images" directory
                    $imageName = upload_image($image);
                    
                    if ($imageName) {
                        $gallery = new Gallery();
                        $gallery->name = $request->name;
                        $gallery->league_id = $request->league_id;
                        $gallery->sport_id = $request->sport_id;
                        $gallery->season_id = $request->season_id;
                        $gallery->path = $imageName;
                        $gallery->save();
                    }
                }
            }
            toast('Gallery Images Has Been Stored.', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            //dd($e);
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
            return redirect()->back();
        } catch (Exception $e) {
            //dd($e);
            alert('Gallery Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
