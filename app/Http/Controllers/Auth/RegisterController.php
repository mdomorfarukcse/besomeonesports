<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "role" => ['required','in:player,user'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:player,user',
            "agree" => ['required','in:on'],
        ], [
            'email.unique' => 'This email is already registered.',
            'role.in' => 'The role should only Player or User.',
            'password.confirmed' => 'Password confirmation does not match.',
            'agree.required' => 'You must have to read the Terms & Conditions and agree it.',
        ]);

        $role = isset($request->role) ? $request->role : 'player';
        
        $response = Http::post(config('app.url').'/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $role, // Assuming the role is provided in the request
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            $data = $response->json();

            // Extract the registered user data from the response
            $user = $data['user'];

            // Authenticate the user
            // Assuming you have a User model and the authentication logic
            auth()->loginUsingId($user['id']);

            // Redirect or return a response based on successful registration
            // return redirect()->route('administration.dashboard.index'); // Adjust the route as per your application's needs
            toast('Hello '. auth()->user()->name . '. You\'ve Registered Successfully. Update Your Profile.','success');
            return redirect()->intended();
        }

        // Handle failed registration
        // For example, return an error message or redirect back to the registration page
        return redirect()->route('register')->with('error', 'Registration failed');
    }
}
