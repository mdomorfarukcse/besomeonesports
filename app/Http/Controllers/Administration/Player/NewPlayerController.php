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
        $divisions = Division::select(['id', 'name', 'status'])->whereStatus('Active')->get();
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
                $playerName = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
                
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
                $player->middle_name = $request->middle_name;
                $player->last_name = $request->last_name;
                $player->birthdate = $request->birthdate;
                $player->contact_number = $request->contact_number;
                $player->city = $request->city;
                $player->state = $request->state;
                $player->postal_code = $request->postal_code;
                $player->street_address = $request->street_address;
                $player->extended_address = $request->extended_address;
                $player->position = $request->position;
                $player->height = $request->height;
                $player->weight = $request->weight;
                $player->note = $request->note;
                
                // Parents Info
                $player->father_name = $request->father_name;
                $player->father_email = $request->father_email;
                $player->father_contact = $request->father_contact;
                $player->mother_name = $request->mother_name;
                $player->mother_email = $request->mother_email;
                $player->mother_contact = $request->mother_contact;
                
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
            dd($e);
            return redirect()->back()->withInput();
        }
    }
}
