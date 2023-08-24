<?php

namespace App\Http\Controllers\API\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\Http\Resources\API\Auth\UserResource;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\API\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

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

            DB::commit();

            return response()->json([
                'token' => $token,
                'user'  => $authUser,
            ], 200);
        } catch (ValidationException $e) {
            DB::rollback();
            // Handle validation errors
            return response()->json(['message' => $e->getMessage()], 422);
        } catch (QueryException $e) {
            DB::rollback();
            // Handle database query exceptions
            return response()->json(['message' => 'Database error'], 500);
        } catch (Exception $e) {
            DB::rollback();
            // Handle other exceptions
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
