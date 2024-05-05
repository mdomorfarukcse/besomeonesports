<?php

namespace App\Http\Controllers\Administration\Player;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Player\Player;
use Illuminate\Support\Carbon;
use App\Models\Division\Division;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\Administration\Player\PlayerLoginCredentialMail;
use App\Http\Requests\Administration\Player\PlayerStoreRequest;
use App\Http\Requests\Administration\Player\PlayerUpdateRequest;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::select(['id', 'user_id', 'player_id', 'contact_number', 'status'])
                            ->with([
                                'user' => function($user) {
                                    $user->select(['id', 'name', 'email', 'avatar']);
                                }
                            ])->orderBy('created_at', 'desc')->get();
        return view('administration.player.index', compact(['players']));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function myPlayers()
    {
        if (Auth::user()->hasRole('coach')) {
            // Get the coach
            $coach = Auth::user()->coach;
            
            // Get the players associated with teams where the coach is the coach
            $players = Player::select(['id', 'user_id', 'player_id', 'contact_number', 'status'])
                                ->whereHas('teams', function ($team) use ($coach) {
                                    $team->where('coach_id', $coach->id);
                                })
                                ->with([
                                    'user' => function($user) {
                                        $user->select(['id', 'name', 'email', 'avatar']);
                                    }
                                ])
                                ->orderBy('created_at', 'desc')
                                ->get();
        } elseif (Auth::user()->hasRole('guardian')) {            
            // Get the players associated with teams where the guardian
            $players = Player::whereGuardianId(auth()->user()->id)
                                ->with([
                                    'user' => function($user) {
                                        $user->select(['id', 'name', 'email', 'avatar']);
                                    }
                                ])
                                ->orderBy('created_at', 'desc')
                                ->get();
        } else {
            $players = [];
        }

        return view('administration.player.my', compact(['players']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::select(['id', 'name', 'gender', 'status'])->whereStatus('Active')->get();
        $player_id = unique_id(11, 11);

        $guardianRole = Role::where('name', 'guardian')->first();
        $guardians = $guardianRole->users;
        return view('administration.player.create', compact(['player_id', 'divisions', 'guardians']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerStoreRequest $requestedValue)
    {
        // $hmm = (object) $requestedValue->players[0];
        // dd($requestedValue->all());
        $player = null;
        try {
            DB::transaction(function() use ($requestedValue, &$player) {
                foreach ((object)$requestedValue->players as $key => $data) {
                    $request = (object)$data;
                    $playerName = $request->first_name.' '.$request->last_name;
                    $playerEmail = $request->email ?? Str::slug($playerName).rand(111,999).'@bss.com';
                    $playerPassword = $request->password ?? '@Player#'.rand(11111111,99999999);
                    
                    // Store Credentials into User
                    $user = new User();
                    $user->name = $playerName;
                    $user->email = $playerEmail;
                    $user->password = Hash::make($playerPassword);

                    if (isset($request->avatar)) {
                        $avatar = upload_image($request->avatar);
                        $user->avatar = $avatar;
                    }

                    $user->save();
                    
                    // Assign the provided role to the user
                    $role = Role::where('name', 'player')->firstOrFail();
                    if ($role) {
                        $user->assignRole($role);
                    }
                    
                    // dd($request);
                    
                    // Store Information into player
                    $player = new Player();
                    
                    $player->user_id = $user->id;
                    $player->player_id = $requestedValue->player_id . '-' . $key;
                    $player->division_id = $requestedValue->division_id;
                    $player->grade = $requestedValue->grade;
                    $player->first_name = $request->first_name;
                    $player->last_name = $request->last_name;
                    $player->birthdate = $request->birthdate;
                    $player->contact_number = $request->contact_number;
                    $player->city = $request->city;
                    $player->state = $request->state;
                    $player->postal_code = $request->postal_code;
                    $player->street_address = $request->street_address;
                    $player->position = $requestedValue->position;
                    $player->shirt_size = $request->shirt_size;
                    $player->short_size = $request->short_size;
                    $player->note = $request->note;
                    $player->status = $requestedValue->status;
                    
                    // Parents Info
                    $player->guardian1_name = $requestedValue->guardian1_name;
                    $player->guardian1_email = $requestedValue->guardian1_email;
                    $player->guardian1_contact = $requestedValue->guardian1_contact;
                    $player->guardian1_relationship = $requestedValue->guardian1_relationship;
                    $player->guardian2_name = $requestedValue->guardian2_name;
                    $player->guardian2_email = $requestedValue->guardian2_email;
                    $player->guardian2_contact = $requestedValue->guardian2_contact;
                    $player->guardian2_relationship = $requestedValue->guardian2_relationship;
                    $player->guardian3_name = $requestedValue->guardian3_name;
                    $player->guardian3_email = $requestedValue->guardian3_email;
                    $player->guardian3_contact = $requestedValue->guardian3_contact;
                    $player->guardian3_relationship = $requestedValue->guardian3_relationship;
                    
                    // Guardian Info
                    if (Auth::user()->hasRole('guardian') && isset($requestedValue->guardian_relation)) {
                        $player->guardian_id = Auth::user()->id;
                        $player->guardian_relation = $requestedValue->guardian_relation;
                    } else {
                        $player->guardian_id = $requestedValue->guardian_id;
                        $player->guardian_relation = $requestedValue->guardian_relation;
                    }
                    
                    
                    $player->save();

                    // Send Mail to the player email
                    $receiverEmail = auth()->user()->email;
                    Mail::to($receiverEmail)->send(new PlayerLoginCredentialMail($request, $playerEmail, $playerPassword));
                }
            }, 5);

            toast('A New Player Has Been Created.','success');
            Session::flash('playeradd', 'A New Player Has Been Created.'); 
            if (Auth::user()->hasRole('guardian')) {
                return redirect()->route('administration.player.my');
            } else {
                return redirect()->route('administration.player.index');
            }
            
        } catch (Exception $e) {
            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            dd($e);
            alert('Player Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return view('administration.player.show', compact(['player']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $divisions = Division::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $guardianRole = Role::where('name', 'guardian')->first();
        $guardians = $guardianRole->users;
        return view('administration.player.edit', compact(['player', 'divisions', 'guardians']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerUpdateRequest $request, Player $player)
    {
        // dd($request->all());
        try {
            DB::transaction(function() use ($request, $player) {
                $playerName = $request->first_name.' '.$request->last_name;
                
                // Store Credentials into User
                $user = User::where('id', $player->user_id)->firstOrFail();
                $user->name = $playerName;
                if (isset($request->avatar)) {
                    $avatar = upload_image($request->avatar);
                    $user->avatar = $avatar;
                }
                $user->save();

                $player->division_id = $request->division_id;
                $player->first_name = $request->first_name;
                $player->last_name = $request->last_name;
                $player->birthdate = $request->birthdate;
                $player->contact_number = $request->contact_number;
                $player->city = $request->city;
                $player->state = $request->state;
                $player->postal_code = $request->postal_code;
                $player->street_address = $request->street_address;
                $player->position = $request->position;
                $player->grade = $request->grade;
                $player->shirt_size = $request->shirt_size;
                $player->short_size = $request->short_size;
                $player->note = $request->note;
                $player->status = $request->status;
                
                // Parents Info
                $player->guardian1_name = $request->guardian1_name;
                $player->guardian1_email = $request->guardian1_email;
                $player->guardian1_contact = $request->guardian1_contact;
                $player->guardian1_relationship = $request->guardian1_relationship;
                $player->guardian2_name = $request->guardian2_name;
                $player->guardian2_email = $request->guardian2_email;
                $player->guardian2_contact = $request->guardian2_contact;
                $player->guardian2_relationship = $request->guardian2_relationship;
                $player->guardian3_name = $request->guardian3_name;
                $player->guardian3_email = $request->guardian3_email;
                $player->guardian3_contact = $request->guardian3_contact;
                $player->guardian3_relationship = $request->guardian3_relationship;
                
                // Guardian Info
                if (Auth::user()->hasRole('guardian') && isset($request->guardian_relation)) {
                    $player->guardian_id = Auth::user()->id;
                    $player->guardian_relation = $request->guardian_relation;
                } else {
                    $player->guardian_id = $request->guardian_id;
                    $player->guardian_relation = $request->guardian_relation;
                }
                
                $player->save();
            }, 5);

            toast('Player Has Been Updated.','success');
            return redirect()->route('administration.player.show', ['player' => $player->id]);
        } catch (Exception $e) {
            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            //dd($e);
            alert('Player Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        
        try {
            $player->delete();

            toast('Player Has Been Deleted.','success');
            return redirect()->route('administration.player.index');
        } catch (Exception $e) {
            //dd($e);
            alert('Player Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Get Divisions list based on gender.
     */

    public function getDivisions(Request $request)
    {
        $gender = $request->input('gender');
        $divisions = Division::where('gender', $gender)->get();

        return response()->json($divisions);
    }
}
