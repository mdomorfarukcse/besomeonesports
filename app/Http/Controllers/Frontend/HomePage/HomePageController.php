<?php

namespace App\Http\Controllers\Frontend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Ads\Ads;
use App\Models\Coach\Coach;
use App\Models\League\League;
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

        $today = now()->toDateString(); 
        $upcomingLeagues = League::whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();
        $modalLeague = League::whereStatus('Active')
                                ->inRandomOrder()
                                ->first();
        $products = Product::with(['images', 'categories'])->whereStatus('Active')->limit(8)->get();
        
        $galleries = Gallery::limit(8)->get();
        $videos = Video::whereStatus('Active')->limit(8)->get();
        $top_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('hometop')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('homebottom')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $teams = Team::whereStatus('Active')->count();
        $leagues = League::whereStatus('Active')->count();
        $coaches = Coach::whereStatus('Active')->count();
        $players = Player::whereStatus('Active')->count();

        $total = [
            'teams' => $teams,
            'leagues' => $leagues,
            'coaches' => $coaches,
            'players' => $players
        ];                  
        return view('frontend.homepage.index', compact(['upcomingLeagues','modalLeague','products','total','galleries','videos','top_ad','bottom_ad']));
    }
}
