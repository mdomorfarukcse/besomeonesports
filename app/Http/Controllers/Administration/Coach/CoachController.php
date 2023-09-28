<?php

namespace App\Http\Controllers\Administration\Coach;

use Exception;
use App\Models\User;
use App\Models\Coach\Coach;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Administration\Coach\CoachStoreRequest;
use App\Http\Requests\Administration\Coach\CoachUpdateRequest;
use App\Mail\Administration\Coach\CoachLoginCredentialMail;
use App\Mail\Administration\Coach\CoachRequestApproveMail;
use App\Mail\Administration\Coach\CoachRequestRejectMail;
use App\Models\Coach\Frontend\CoachRequest;
use Illuminate\Support\Facades\Mail;

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
     * Display a listing of the resource.
     */
    public function myCoaches()
    {
        if (Auth::user()->hasRole('player')) {
            // Get the player
            $player = Auth::user()->player;

            // Get the coaches associated with teams where the coach is the coach
            $coaches = Coach::select(['id', 'user_id', 'coach_id', 'phone_number', 'status'])
                                ->whereHas('teams', function ($team) use ($player) {
                                    $team->whereHas('players', function ($query) use ($player) {
                                        $query->where('players.id', $player->id);
                                    });
                                })
                                ->with([
                                    'user' => function ($user) {
                                        $user->select(['id', 'name', 'email', 'avatar']);
                                    }
                                ])
                                ->orderBy('created_at', 'desc')
                                ->get();
        } else {
            $coaches = NULL;
        }
        // dd($coaches);
        return view('administration.coach.my', compact(['coaches']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coach_id = unique_id(11, 11);
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

                $avatar = upload_image($request->avatar);
                // Store Credentials into User
                $user = User::create([
                    'name' => $coachName,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'avatar' => $avatar,
                ]);
        
                // Assign the provided role to the user
                $role = Role::where('name', 'coach')->firstOrFail();
                if ($role) {
                    $user->assignRole($role);
                }
    
    
                // Store Information into Coach
                $coach = new Coach();
    
                $coach->user_id = $user->id;
                $coach->coach_id = $request->coach_id;
                $coach->position = $request->position;
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

                // Send Mail to the coach email
                Mail::to($user->email)->send(new CoachLoginCredentialMail($request));
            }, 5);

            toast('A New Coach Has Been Created.','success');
            return redirect()->route('administration.coach.index');
        } catch (Exception $e) {
            dd($e);
            alert('Coach Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        return view('administration.coach.show', compact(['coach']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        return view('administration.coach.edit', compact(['coach']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoachUpdateRequest $request, Coach $coach)
    {
        // dd($request->position);
        try {
            DB::transaction(function() use ($request, $coach) {
                $coachName = $request->first_name.' '.$request->middle_name.' '.$request->last_name;

                // Store Credentials into User
                $user = User::whereId($coach->user_id)->firstOrFail();
                $user->name = $coachName;
                
                if (isset($request->avatar)) {
                    $avatar = upload_image($request->avatar);
                    $user->avatar = $avatar;
                }
                $user->save();
                
                $coach->position = $request->position;
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

            toast('Coach Has Been Updated.','success');
            return redirect()->route('administration.coach.index');
        } catch (Exception $e) {
            dd($e);
            alert('Coach Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coach $coach)
    {
        try {
            $coach->delete();

            toast('Coach Has Been Deleted.','success');
            return redirect()->route('administration.coach.index');
        } catch (Exception $e) {
            dd($e);
            alert('Coach Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    
    
    
    /**
     * Display a listing of the resource.
     */
    public function request()
    {
        $coaches = CoachRequest::all();

        return view('administration.coach.request', compact(['coaches']));
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function requestShow(CoachRequest $coach)
    {
        return view('administration.coach.request_show', compact(['coach']));
    }
    
    
    /**
     * Update Request Status
     */
    public function updateRequest(CoachRequest $coach, string $status)
    {
        $status = decrypt($status);
        // dd($coach,$status);

        if ($status === 'Approve') {
            try {
                DB::transaction(function() use ($coach) {
                    $coachName = $coach->first_name.' '.$coach->middle_name.' '.$coach->last_name;
                    
                    // Store Credentials into User
                    $user = User::create([
                        'name' => $coachName,
                        'email' => $coach->email,
                        'password' => Hash::make($coach->password),
                        'avatar' => $coach->avatar,
                    ]);
            
                    // Assign the provided role to the user
                    $role = Role::where('name', 'coach')->firstOrFail();
                    if ($role) {
                        $user->assignRole($role);
                    }
        
        
                    // Store Information into Coach
                    $coachInfo = new Coach();
        
                    $coachInfo->user_id = $user->id;
                    $coachInfo->coach_id = unique_id(11,11);
                    $coachInfo->first_name = $coach->first_name;
                    $coachInfo->middle_name = $coach->middle_name;
                    $coachInfo->last_name = $coach->last_name;
                    $coachInfo->birthdate = $coach->birthdate;
                    $coachInfo->phone_number = $coach->phone_number;
                    $coachInfo->usab_license_no = $coach->usab_license_no;
                    $coachInfo->city = $coach->city;
                    $coachInfo->state = $coach->state;
                    $coachInfo->postal_code = $coach->postal_code;
                    $coachInfo->street_address = $coach->street_address;
                    $coachInfo->extended_address = $coach->extended_address;

                    $coachInfo->save();

                    // Send Mail to the coach email
                    Mail::to($user->email)->send(new CoachRequestApproveMail($coach));

                    $coach->delete();
                }, 5);
    
                toast('A New Coach Has Been Created.','success');
                return redirect()->route('administration.coach.request');
            } catch (Exception $e) {
                dd($e);
                alert('Coach Creation Failed!', 'There is some error! Please fix and try again.', 'error');
                return redirect()->back()->withInput();
            }
        } else {
            // Send Mail to the coach email
            Mail::to($coach->email)->send(new CoachRequestRejectMail($coach));

            $coach->delete();

            toast('Coach Has Been Canceled.','success');
            return redirect()->route('administration.coach.request');
        }
        

        return view('administration.coach.request_show', compact(['coach']));
    }
}
