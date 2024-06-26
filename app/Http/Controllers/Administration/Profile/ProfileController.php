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
    
    public function apiIndex()
    {
        $auth_user_id = Auth::user()->id;
        $profile = User::with(['player', 'coach'])->whereId($auth_user_id)->firstOrFail();
        
        $profile->makeHidden([
            'email_verified_at', 
            'remember_token', 
            'created_at', 
            'updated_at', 
            'deleted_at'
        ]);
        
        if ($profile->player) {
            $profile->player->makeHidden([
                'created_at', 
                'updated_at', 
                'deleted_at'
            ]);
        }
    
        if ($profile->coach) {
            $profile->coach->makeHidden([
                'created_at', 
                'updated_at', 
                'deleted_at'
            ]);
        }

        return response()->json($profile);
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


    public function apiPasswordUpdate(Request $request)
    {
        $user = Auth::user();
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

            return response()->json(['success' => 'Password Updated']);
        } catch (Exception $e){
            return response()->json(['error' => 'There is some error! The Error is: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $auth_user_id = Auth::user()->id;
        $profile = User::with(['player', 'coach'])->whereId($auth_user_id)->firstOrFail();

        if($profile->player) {
            $guardians = User::role('guardian')->get();
        } else {
            $guardians = null;
        }
        // dd($guardians);
        return view('administration.profile.edit', compact(['profile', 'guardians']));
    }

    /**
     * Update the Player Profile.
     */
    public function playerUpdate(PlayerUpdateRequest $request, Player $player)
    {
        // dd($request->all(), $player->user);
        try {
            DB::transaction(function() use ($request, $player) {
                $playerName = $request->first_name.' '.$request->last_name;
                
                // Store Credentials into User
                $user = User::where('id', $player->user_id)->firstOrFail();
                $user->name = $playerName;
                if (isset($request->avatar)) {
                    $avatar = upload_image($request->avatar);
                    $user->avatar = $avatar;
                }
                $user->save();

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
                $player->status = $request->status;
                
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
                $player->guardian_id = $request->guardian_id;
                $player->guardian_relation = $request->guardian_relation;
                
                $player->save();
            }, 5);

            toast('Your Profile Has Been Updated.','success');
            return redirect()->route('administration.profile.index');
        } catch (Exception $e) {
            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            //dd($e);
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
                $coachName = $request->first_name.' '.$request->last_name;

                // Store Credentials into User
                $user = User::whereId($coach->user_id)->firstOrFail();
                
                $user->name = $coachName;
                if (isset($request->avatar)) {
                    $avatar = upload_image($request->avatar);
                    $user->avatar = $avatar;
                }
                $user->save();
                
                $coach->position = $request->position;
                $coach->first_name = $request->first_name;
                $coach->last_name = $request->last_name;
                $coach->birthdate = $request->birthdate;
                $coach->phone_number = $request->phone_number;
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
            //dd($e);
            alert('Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Update the Admin / Developer.
     */
    public function adminUpdate(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],
            'contact_number' => 'required|string',
            'birthdate' => 'required|date|date_format:Y-m-d',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'address' => 'required|string',
        ]);

        // dd($request->all(), $user);
        try {
            if (isset($request->avatar)) {
                $avatar = upload_image($request->avatar);
                $user->avatar = $avatar;
            }

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;
            $user->birthdate = $request->birthdate;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;

            $user->save();

            toast('Profile Has Been Updated.','success');
            return redirect()->route('administration.profile.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Update the User.
     */
    public function userUpdate(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'contact_number' => 'required|string',
            'birthdate' => 'required|date|date_format:Y-m-d',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'address' => 'required|string',
        ]);

        // dd($request->all(), $user);
        try {
            if (isset($request->avatar)) {
                $avatar = upload_image($request->avatar);
                $user->avatar = $avatar;
            }

            $user->name = $request->name;
            $user->contact_number = $request->contact_number;
            $user->birthdate = $request->birthdate;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;

            $user->save();

            toast('Profile Has Been Updated.','success');
            return redirect()->route('administration.profile.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }


    public function apiUpdateProfile(Request $request) {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'contact_number' => 'required|string',
            'birthdate' => 'required|date|date_format:Y-m-d',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = Auth::user();
        try {
            if (isset($request->avatar)) {
                $avatar = upload_image($request->avatar);
                $user->avatar = $avatar;
            }

            $user->name = $request->name;
            $user->contact_number = $request->contact_number;
            $user->birthdate = $request->birthdate;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;

            $user->save();

            return response()->json(['user' => $user]);
        } catch (Exception $e) {
            return response()->json(['error' => 'There is some error! The Error is: ' . $e->getMessage()]);
        }
    }
}
