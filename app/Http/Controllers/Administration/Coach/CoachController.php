<?php

namespace App\Http\Controllers\Administration\Coach;

use Exception;
use App\Models\User;
use App\Models\Coach\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Administration\Coach\CoachStoreRequest;
use App\Http\Requests\Administration\Coach\CoachUpdateRequest;

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

                $avatar = upload_avatar($request, 'avatar');
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

                $avatar = upload_avatar($request, 'avatar');
                // Store Credentials into User
                $user = User::whereId($coach->user_id)->firstOrFail();

                $user->name = $coachName;
                if (isset($request->avatar)) {
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
}
