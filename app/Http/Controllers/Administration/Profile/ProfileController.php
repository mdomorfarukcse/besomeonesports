<?php

namespace App\Http\Controllers\Administration\Profile;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
