<?php

namespace App\Http\Controllers\Administration\Profile;

use Exception;
use App\Models\User;
use App\Models\Coach\Coach;
use Illuminate\Http\Request;
use App\Models\Player\Player;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Administration\Coach\CoachUpdateRequest;
use App\Http\Requests\Administration\Player\PlayerUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user_id = Auth::user()->id;
        $profile = User::with(['player', 'coach'])->whereId($auth_user_id)->firstOrFail();
        // dd($profile);
        return view('administration.profile.index', compact(['profile']));
    }

    /**
     * Show the form for security.
     */
    public function security()
    {
        return view('administration.profile.security');
    }

    /**
     * Update Password
     */
    public function passwordUpdate(Request $request, User $user)
    {
        // dd($request->all(), $user);
        // Validate the request data
        $request->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The old password is incorrect.');
                    }
                },
            ],
            'new_password' => [
                'required',
                'min:8',
                'confirmed',
                Rule::notIn([$request->input('old_password')]),
            ],
        ], [
            'new_password.not_in' => 'The new password must not be the same as the old password.',
        ]);

        try{
            $user->update([
                'password' => Hash::make($request->input('new_password')),
            ]);

            toast('Password Has Been Updated.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            throw new Exception('Password Didn\'t Update.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $auth_user_id = Auth::user()->id;
        $profile = User::with(['player', 'coach'])->whereId($auth_user_id)->firstOrFail();

        return view('administration.profile.edit', compact(['profile']));
    }

    /**
     * Update the Player Profile.
     */
    public function playerUpdate(PlayerUpdateRequest $request, Player $player)
    {
        // dd($request->all(), $player->user);
        try {
            DB::transaction(function() use ($request, $player) {
                $playerName = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
                
                $avatar = upload_avatar($request, 'avatar');
                // Store Credentials into User
                $user = User::where('id', $player->user_id)->firstOrFail();
                $user->name = $playerName;
                if (isset($request->avatar)) {
                    $user->avatar = $avatar;
                }
                $user->save();

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
                $player->status = $request->status;
                
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

            toast('Your Profile Has Been Updated.','success');
            return redirect()->route('administration.profile.index');
        } catch (Exception $e) {
            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            dd($e);
            alert('Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Update the Coach.
     */
    public function coachUpdate(CoachUpdateRequest $request, Coach $coach)
    {
        // dd($request->all(), $coach->user);
        try {
            DB::transaction(function() use ($request, $coach) {
                $coachName = $request->first_name.' '.$request->middle_name.' '.$request->last_name;

                $avatar = upload_avatar($request, 'avatar');
                // Store Credentials into User
                $user = User::whereId($coach->user_id)->firstOrFail();

                $user->name = $coachName;
                if (isset($request->avatar)) {
                    $user->avatar = $avatar;
                }
                $user->save();
                
                $coach->position = $request->position;
                $coach->first_name = $request->first_name;
                $coach->middle_name = $request->middle_name;
                $coach->last_name = $request->last_name;
                $coach->birthdate = $request->birthdate;
                $coach->phone_number = $request->phone_number;
                $coach->usab_license_no = $request->usab_license_no;
                $coach->city = $request->city;
                $coach->state = $request->state;
                $coach->postal_code = $request->postal_code;
                $coach->street_address = $request->street_address;
                $coach->extended_address = $request->extended_address;
                $coach->note = $request->note;
                $coach->status = $request->status;
                
                $coach->save();
            }, 5);

            toast('Profile Has Been Updated.','success');
            return redirect()->route('administration.profile.index');
        } catch (Exception $e) {
            dd($e);
            alert('Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
