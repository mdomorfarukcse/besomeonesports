<?php

namespace App\Http\Controllers\Administration\Dashboard;

use Carbon\Carbon;
use App\Models\Team\Team;
use App\Models\Event\Event;
use App\Models\Sport\Sport;
use Illuminate\Http\Request;
use App\Models\Player\Player;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::whereStatus('Active')->count();
        $events = Event::whereStatus('Active')->count();
        $sports = Sport::whereStatus('Active')->count();
        $players = Player::whereStatus('Active')->count();

        $registrations = DB::table('event_player')->sum('total_paid');

        $sales = Order::sum('total_price');
        
        $total = [
            'teams' => $teams,
            'events' => $events,
            'sports' => $sports,
            'players' => $players,
            'registrations' => $registrations,
            'sales' => $sales,
        ];

        $upcomingEvents = Event::whereDate('start', '>', now())
                                ->whereStatus('Active')
                                ->orderBy('start', 'asc')
                                ->get();

        return view('administration.dashboard.index', compact(['total', 'upcomingEvents']));
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
