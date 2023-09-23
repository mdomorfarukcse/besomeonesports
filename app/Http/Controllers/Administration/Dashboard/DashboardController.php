<?php

namespace App\Http\Controllers\Administration\Dashboard;

use App\Models\Team\Team;
use App\Models\League\League;
use App\Models\Sport\Sport;
use Illuminate\Http\Request;
use App\Models\Player\Player;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::whereStatus('Active')->count();
        $leagues = League::whereStatus('Active')->count();
        $sports = Sport::whereStatus('Active')->count();
        $players = Player::whereStatus('Active')->count();

        $registrations = DB::table('league_player')->sum('total_paid');

        $sales = Order::sum('total_price');
        
        $total = [
            'teams' => $teams,
            'leagues' => $leagues,
            'sports' => $sports,
            'players' => $players,
            'registrations' => $registrations,
            'sales' => $sales,
        ];

        $upcomingLeagues = League::whereDate('start', '>', now())
                                ->whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();

        return view('administration.dashboard.index', compact(['total', 'upcomingLeagues']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
