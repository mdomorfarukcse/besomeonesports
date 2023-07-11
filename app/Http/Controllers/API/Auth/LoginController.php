<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Resources\API\Auth\UserResource;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $authUser = Auth::user();
            $role = $authUser->role; // Get the user's role from the 'role' column or JSON field
            $permissions = $this->getPermissionsForRole($role); // Implement the logic to retrieve permissions based on the role

            $token = $authUser->createToken('authToken', $permissions)->plainTextToken;

            // Get Auth User
            $user = new UserResource(auth()->user());
            
            return response()->json([
                'token' => $token,
                'user'  => $user,
            ], 200);
        }

        return response()->json(['message' => 'Invalid login credentials'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    private function getPermissionsForRole($role)
    {
        $role = Role::where('name', $role)->first();

        if ($role) {
            return $role->permissions->pluck('name')->toArray();
        }

        return [];
    }
}
