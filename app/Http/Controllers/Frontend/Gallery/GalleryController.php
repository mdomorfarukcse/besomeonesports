<?php

namespace App\Http\Controllers\Frontend\Gallery;

use App\Models\Sport\Sport;
use App\Models\Video\Video;
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
    public function index(Request $request)
    {
        $query = Gallery::orderBy('created_at', 'desc');
        if ($request->filled('season_id')) {
            $query->where('season_id', $request->season_id);
        }
        if ($request->filled('sport_id')) {
            $query->where('sport_id', $request->sport_id);
        }
        if ($request->filled('league_id')) {
            $query->where('league_id', $request->league_id);
        }

        $galleries = $query->get();
        $videos = Video::whereStatus('Active')->get();
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
        return view('frontend.gallery.index', compact(['galleries', 'videos', 'leagues', 'sports', 'seasons', 'request']));
    }
}
