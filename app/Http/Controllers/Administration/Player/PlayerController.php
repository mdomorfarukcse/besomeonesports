<?php

namespace App\Http\Controllers\Administration\Player;

use Exception;
use App\Models\User;
use App\Models\Player\Player;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Administration\Player\PlayerStoreRequest;
use App\Http\Requests\Administration\Player\PlayerUpdateRequest;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $player_id = $this->generateUniqueID();
        return view('administration.player.create', compact('player_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerStoreRequest $request)
    {
        try {
            DB::transaction(function() use ($request) {
                $playerName = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
                
                $avatar = upload_avatar($request, 'avatar');
                // Store Credentials into User
                $user = User::create([
                    'name' => $playerName,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'avatar' => $avatar,
                ]);
                
                // Assign the provided role to the user
                $role = Role::where('name', 'player')->firstOrFail();
                if ($role) {
                    $user->assignRole($role);
                }
                
                
                // Store Information into player
                $player = new Player();
                
                $player->user_id = $user->id;
                $player->player_id = $request->player_id;
                $player->first_name = $request->first_name;
                $player->middle_name = $request->middle_name;
                $player->last_name = $request->last_name;
                $player->birthdate = $request->birthdate;
                $player->contact_number = $request->contact_number;
                $player->city = $request->city;
                $player->state = $request->state;
                $player->postal_code = $request->postal_code;
                $player->street_address = $request->street_address;
                $player->extended_address = $request->extended_address;
                $player->position = $request->position;
                $player->height = $request->height;
                $player->weight = $request->weight;
                $player->note = $request->note;
                $player->status = $request->status;
                
                // Parents Info
                $player->father_name = $request->father_name;
                $player->father_email = $request->father_email;
                $player->father_contact = $request->father_contact;
                $player->mother_name = $request->mother_name;
                $player->mother_email = $request->mother_email;
                $player->mother_contact = $request->mother_contact;
                
                // Guardian Info
                $player->guardian_relation = $request->guardian_relation;
                $player->guardian_name = $request->guardian_name;
                $player->guardian_email = $request->guardian_email;
                $player->guardian_contact = $request->guardian_contact;
                
                $player->save();
            }, 5);

            toast('A New Player Has Been Created.','success');
            return redirect()->route('administration.player.index');
        } catch (Exception $e) {
            // toast('There is some error! Please fix and try again. Error: '.$e,'error');
            // dd($e);
            alert('Player Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerUpdateRequest $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
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
