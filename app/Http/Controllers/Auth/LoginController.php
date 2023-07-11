<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://spatierolepermission.test/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            $data = $response->json();

            // Extract the token and user data from the response
            $token = $data['token'];
            $userData = $data['user'];

            // Store the token in the session or any other desired storage mechanism
            // For example, store it in the session:
            session(['access_token' => $token]);

            // Authenticate the user
            // Assuming you have a User model and the authentication logic
            $user = User::where('email', $userData['email'])->first();
            auth()->login($user);

            // Redirect or return a response based on successful login
            return redirect()->route('home'); // Adjust the route as per your application's needs
        }

        // Handle failed login
        // For example, return an error message or redirect back to the login page
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }
}
