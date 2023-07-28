<?php

namespace App\Http\Controllers\Administration\Coach;

use Exception;
use App\Models\User;
use App\Models\Coach\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Administration\Coach\CoachStoreRequest;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches = Coach::select(['id', 'user_id', 'coach_id', 'phone_number', 'status'])
                            ->with([
                                'user' => function($user) {
                                    $user->select(['id', 'name', 'email', 'avatar']);
                                }
                            ])->orderBy('created_at', 'desc')->get();

        return view('administration.coach.index', compact(['coaches']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coach_id = $this->generateUniqueID();
        return view('administration.coach.create', compact('coach_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoachStoreRequest $request)
    {
        // dd($request->all());

        try {
            DB::transaction(function() use ($request) {
                $coachName = $request->first_name.' '.$request->middle_name.' '.$request->last_name;

                $avatar = upload_avatar($request, 'avatar');
                // Store Credentials into User
                $user = User::create([
                    'name' => $coachName,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'avatar' => $avatar,
                ]);
        
                // Assign the provided role to the user
                $role = Role::where('name', 'coach')->first();
                if ($role) {
                    $user->assignRole($role);
                }
    
    
                // Store Information into Coach
                $coach = new Coach();
    
                $coach->user_id = $user->id;
                $coach->coach_id = $request->coach_id;
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

            toast('A New Coach Has Been Created.','success');
            return redirect()->route('administration.coach.index');
        } catch (Exception $e) {
            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            // dd($e);
            alert('Coach Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
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


    // Generate a unique ID with a minimum and maximum length of 10 characters
    private function generateUniqueID() {
        $length = 10;
        $timestampLength = 13; // Length of the timestamp in milliseconds
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Get the current timestamp in milliseconds
        $timestamp = round(microtime(true) * 1000);
    
        // Convert the timestamp to a string and remove the decimal point
        $timestampString = str_replace('.', '', (string)$timestamp);
    
        // Calculate the number of characters needed to fill the remaining length
        $charactersNeeded = $length - $timestampLength;
    
        // Ensure we have enough characters to fill the length
        while (strlen($timestampString) < $charactersNeeded) {
            $randomCharacter = $characters[random_int(0, strlen($characters) - 1)];
            $timestampString .= $randomCharacter;
        }
    
        // Convert the timestamp to all capital letters
        $timestampString = strtoupper($timestampString);
    
        // Combine the timestamp with the random characters and take the first $length characters
        $uniqueID = substr($timestampString, 0, $length);
    
        return $uniqueID;
    }
}
