<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->role; // Get the user's role from the 'role' column or JSON field
            $permissions = $this->getPermissionsForRole($role); // Implement the logic to retrieve permissions based on the role
            
            $token = $user->createToken('authToken', $permissions)->plainTextToken;
            return response()->json(['token' => $token], 200);
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
