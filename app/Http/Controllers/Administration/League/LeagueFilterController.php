<?php

namespace App\Http\Controllers\Administration\League;

use Illuminate\Http\Request;
use App\Models\League\League;
use App\Http\Controllers\Controller;
use App\Models\Division\Division;

class LeagueFilterController extends Controller
{
    public function fetchLeaguesBySport($sport_id)
    {
        // dd($sport_id);
        $leagues = League::select(['id', 'season_id', 'sport_id', 'name', 'status'])->where('sport_id', $sport_id)->get();        
        return response()->json($leagues);
    }
    
    public function fetchLeaguesByDivision($division_id)
    {
        $division = Division::with(['leagues' => function ($league) {
            $league->select(['id', 'season_id', 'sport_id', 'name', 'status'])->get();
        }])->whereId($division_id)->first();

        // dd($division->leagues);

        $leagues = $division->leagues;        
        return response()->json($leagues);
    }
}
