<?php

namespace App\Http\Controllers\Administration\Player;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Player\Player;
use App\Models\Division\Division;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Administration\Player\NewPlayerUpdateRequest;

class NewPlayerController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        if ($user && $user->hasRole('player') && $user->player) {
            return redirect()->route('administration.dashboard.index');
        }
    }


    public function index() {
        $divisions = Division::select(['id', 'name', 'status'])->whereStatus('Active')->orderBy('created_at', 'asc')->get();
        $player_id = unique_id(11, 11);
        $user = Auth::user();

        if ($user && $user->hasRole('player') && $user->player) {
            return redirect()->route('administration.profile.index');
        }
        return view('administration.player.new', compact(['player_id', 'divisions', 'user']));
    }

    public function update(NewPlayerUpdateRequest $request, User $user) {
        // dd($request->all(), $user);
        try {
            DB::transaction(function() use ($request, $user) {
                $playerName = $request->first_name.' '.$request->last_name;
                
                $user->name = $playerName;
                if (isset($request->avatar)) {
                    $avatar = upload_image($request->avatar);
                    $user->avatar = $avatar;
                }
                $user->save();                
                
                // Store Information into player
                $player = new Player();
                
                $player->user_id = $user->id;
                $player->player_id = $request->player_id;
                $player->division_id = $request->division_id;
                $player->first_name = $request->first_name;
                $player->last_name = $request->last_name;
                $player->birthdate = $request->birthdate;
                $player->contact_number = $request->contact_number;
                $player->city = $request->city;
                $player->state = $request->state;
                $player->postal_code = $request->postal_code;
                $player->street_address = $request->street_address;
                $player->position = $request->position;
                $player->height = $request->height;
                $player->weight = $request->weight;
                $player->note = $request->note;
                
                // Parents Info
                $player->guardian1_name = $request->guardian1_name;
                $player->guardian1_email = $request->guardian1_email;
                $player->guardian1_contact = $request->guardian1_contact;
                $player->guardian1_relationship = $request->guardian1_relationship;
                $player->guardian2_name = $request->guardian2_name;
                $player->guardian2_email = $request->guardian2_email;
                $player->guardian2_contact = $request->guardian2_contact;
                $player->guardian2_relationship = $request->guardian2_relationship;
                $player->guardian3_name = $request->guardian3_name;
                $player->guardian3_email = $request->guardian3_email;
                $player->guardian3_contact = $request->guardian3_contact;
                $player->guardian3_relationship = $request->guardian3_relationship;
                
                // Guardian Info
                $player->guardian_relation = $request->guardian_relation;
                $player->guardian_name = $request->guardian_name;
                $player->guardian_email = $request->guardian_email;
                $player->guardian_contact = $request->guardian_contact;
                
                $player->save();
            }, 5);

            toast('Profile Has Been Updated.','success');
            return redirect()->route('administration.profile.index');
        } catch (Exception $e) {
            //dd($e);
            return redirect()->back()->withInput();
        }
    }
}
