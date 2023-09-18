<?php

namespace App\Http\Controllers\Frontend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Coach\Coach;
use App\Models\Event\Event;
use App\Models\Gallery\Gallery;
use App\Models\Player\Player;
use App\Models\Shop\Product\Product;
use App\Models\Sport\Sport;
use App\Models\Team\Team;
use App\Models\Video\Video;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    function index() {

        $upcomingEvents = Event::whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();
        $products = Product::with(['images', 'categories'])->whereStatus('Active')->limit(8)->get();
        
        $galleries = Gallery::whereStatus('Active')->limit(8)->get();
        $videos = Video::whereStatus('Active')->limit(8)->get();
        

        $teams = Team::whereStatus('Active')->count();
        $events = Event::whereStatus('Active')->count();
        $coaches = Coach::whereStatus('Active')->count();
        $players = Player::whereStatus('Active')->count();

        $total = [
            'teams' => $teams,
            'events' => $events,
            'coaches' => $coaches,
            'players' => $players
        ];                  
        return view('frontend.homepage.index', compact(['upcomingEvents','products','total','galleries','videos']));
    }
}
