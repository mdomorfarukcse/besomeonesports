<?php

namespace App\Http\Controllers\Administration\Referee;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Administration\Referee\RefereeStoreRequest;
use App\Http\Requests\Administration\Referee\RefereeUpdateRequest;
use App\Models\User\Frontend\RefereeRequest;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referees = User::role('referee')->get();
        
        return view('administration.referee.index', compact(['referees']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.referee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RefereeStoreRequest $request)
    {
        // dd($request->all());
        try {
            DB::transaction(function() use ($request) {
                $user = new User();

                $user->name = $request->first_name . ' ' . $request->last_name;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->password = Hash::make(generate_password());
                $user->birthdate = $request->birthdate;
                $user->contact_number = $request->contact_number;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->postal_code = $request->postal_code;
                $user->address = $request->address;

                if (isset($request->avatar)) {
                    $avatar = upload_image($request->avatar);
                    $user->avatar = $avatar;
                }

                $user->save();
                
                // Assign the provided role to the user
                $role = Role::where('name', 'referee')->firstOrFail();
                if ($role) {
                    $user->assignRole($role);
                }
            }, 5);

            toast('A New Referee Has Been Created.','success');
            return redirect()->route('administration.referee.index');
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $referee)
    {
        // dd($referee);
        return view('administration.referee.show', compact(['referee']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $referee)
    {
        return view('administration.referee.edit', compact(['referee']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RefereeUpdateRequest $request, User $referee)
    {
        try {
            DB::transaction(function() use ($request, $referee) {
                if ($request->avatar) {
                    $avatar = upload_image($request->avatar);
                    $referee->avatar = $avatar;
                }

                $referee->name = $request->first_name . ' ' . $request->last_name;
                $referee->first_name = $request->first_name;
                $referee->last_name = $request->last_name;
                $referee->email = $request->email;
                $referee->birthdate = $request->birthdate;
                $referee->contact_number = $request->contact_number;
                $referee->city = $request->city;
                $referee->state = $request->state;
                $referee->postal_code = $request->postal_code;
                $referee->address = $request->address;

                $referee->save();
            }, 5);

            toast('Referee Information Has Been Updated.','success');
            return redirect()->back();
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $referee)
    {
        try {
            $referee->delete();

            toast('Referee Has Been Deleted.','success');
            return redirect()->back();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    
    
    
    /**
     * Display a listing of the resource.
     */
    public function request()
    {
        $referees = RefereeRequest::all();

        return view('administration.referee.request', compact(['referees']));
    }

    /**
     * Display a listing of the resource.
     */
    public function requestShow(RefereeRequest $referee)
    {
        return view('administration.referee.request_show', compact(['referee']));
    }
    
    
    /**
     * Update Request Status
     */
    public function updateRequest(RefereeRequest $referee, string $status)
    {
        $status = decrypt($status);
        // dd($referee,$status);

        if ($status === 'Approve') {
            try {
                DB::transaction(function() use ($referee) {
                    $refereeName = $referee->first_name.' '.$referee->last_name;
                    
                    // Store Credentials into User
                    $user = User::create([
                        'name' => $refereeName,
                        'email' => $referee->email,
                        'password' => Hash::make($referee->password),
                        'avatar' => $referee->avatar,
                    ]);
                    
                    // Assign the provided role to the user
                    $role = Role::where('name', 'referee')->firstOrFail();
                    if ($role) {
                        $user->assignRole($role);
                    }
                    
                    $user->first_name = $referee->first_name;
                    $user->last_name = $referee->last_name;
                    $user->birthdate = $referee->birthdate;
                    $user->contact_number = $referee->contact_number;
                    $user->city = $referee->city;
                    $user->state = $referee->state;
                    $user->postal_code = $referee->postal_code;
                    $user->address = $referee->address;
                    $user->sport_of_interests = $referee->sport_of_interests;

                    $user->save();

                    // Send Mail to the referee email
                    //Mail::to($user->email)->send(new refereeRequestApproveMail($referee));

                    $referee->delete();
                }, 5);
    
                toast('A New Referee Has Been Created.','success');
                return redirect()->route('administration.referee.request');
            } catch (Exception $e) {
                //dd($e);
                alert('Referee Creation Failed!', 'There is some error! Please fix and try again.', 'error');
                return redirect()->back()->withInput();
            }
        } else {
            // Send Mail to the referee email
            //Mail::to($referee->email)->send(new refereeRequestRejectMail($referee));

            $referee->delete();

            toast('Referee Has Been Canceled.','success');
            return redirect()->route('administration.referee.request');
        }
        

        return view('administration.referee.request_show', compact(['referee']));
    }
}
