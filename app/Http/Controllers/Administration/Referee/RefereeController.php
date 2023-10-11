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
                $avatar = upload_image($request->avatar);

                $user = new User();

                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make(generate_password());
                $user->birthdate = $request->birthdate;
                $user->contact_number = $request->contact_number;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->postal_code = $request->postal_code;
                $user->address = $request->address;
                $user->avatar = $avatar;

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
                $avatar = upload_image($request->avatar);

                $referee->name = $request->name;
                $referee->email = $request->email;
                $referee->birthdate = $request->birthdate;
                $referee->contact_number = $request->contact_number;
                $referee->city = $request->city;
                $referee->state = $request->state;
                $referee->postal_code = $request->postal_code;
                $referee->address = $request->address;
                $referee->avatar = $avatar;

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
}
