<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\API\Auth\UserResource;
use App\Http\Requests\API\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Assign the provided role to the user
        $role = Role::where('name', $request->input('role'))->first();
        if ($role) {
            $user->assignRole($role);
        }

        // Generate an authentication token
        $token = $user->createToken('authToken')->plainTextToken;

        // Get Auth User
        $authUser = new UserResource($user);

        return response()->json([
            'token' => $token,
            'user'  => $authUser,
        ], 200);
    }
}
