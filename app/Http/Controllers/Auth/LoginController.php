<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        set_time_limit(0);
    }

    public function login(Request $request)
    {
        try{
            // $response = Http::post(config('app.url').'/api/login', [
            //     'email' => $request->email,
            //     'password' => $request->password,
            // ]);
            $url = config('app.url') . '/api/login';
            $postData = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            // Initialize cURL session
            $ch = curl_init($url);

            // Set cURL options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

            // Execute cURL session
            $curl_response = curl_exec($ch);
           
            // Check for cURL errors
            if (curl_errno($ch)) {
                // Handle cURL error
                return redirect()->route('login')->with('error', 'Something is Wrong. Please try again');
            }
            // Close cURL session
            curl_close($ch);

            // Process the response as needed
            
            // Check if the request was successful
            $data = json_decode($curl_response, true);

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
            
            toast('Hello '. auth()->user()->name . '. You\'re Logged In.','success');
            return redirect()->route('administration.dashboard.index');
        } catch (Exception $e) {

            // Handle failed login
            // For example, return an error message or redirect back to the login page
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();

            // Call the logout API endpoint
            $response = Http::post(config('app.url').'/api/logout', [
                'token' => $request->session()->get('access_token'),
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Auth::guard('web')->logout();

                return redirect()->route('frontend.homepage.index')->with('message', 'Logged out successfully');
            }
        }

        // Handle failed logout or when the user is not authenticated
        // For example, return an error message or redirect back to the home page
        return redirect()->route('home')->with('error', 'Failed to logout');
    }

}
