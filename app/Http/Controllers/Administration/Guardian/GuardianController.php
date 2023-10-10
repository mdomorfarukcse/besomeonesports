<?php

namespace App\Http\Controllers\Administration\Guardian;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Guardian\GuardianStoreRequest;
use App\Http\Requests\Administration\Guardian\GuardianUpdateRequest;
use Illuminate\Support\Facades\Hash;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = User::role('guardian')->get();
        
        return view('administration.guardian.index', compact(['guardians']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.guardian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardianStoreRequest $request)
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
                $role = Role::where('name', 'guardian')->firstOrFail();
                if ($role) {
                    $user->assignRole($role);
                }
            }, 5);

            toast('A New Guardian Has Been Created.','success');
            return redirect()->route('administration.guardian.index');
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $guardian)
    {
        return view('administration.guardian.show', compact(['guardian']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $guardian)
    {
        return view('administration.guardian.edit', compact(['guardian']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuardianUpdateRequest $request, User $guardian)
    {
        // dd($request->all(), $guardian);
        try {
            DB::transaction(function() use ($request, $guardian) {
                $avatar = upload_image($request->avatar);

                $guardian->name = $request->name;
                $guardian->email = $request->email;
                $guardian->birthdate = $request->birthdate;
                $guardian->contact_number = $request->contact_number;
                $guardian->city = $request->city;
                $guardian->state = $request->state;
                $guardian->postal_code = $request->postal_code;
                $guardian->address = $request->address;
                $guardian->avatar = $avatar;

                $guardian->save();
            }, 5);

            toast('Guardian Information Has Been Updated.','success');
            return redirect()->back();
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $guardian)
    {
        try {
            $guardian->delete();

            toast('Guardian Has Been Deleted.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            throw new Exception($e->getMessage());
            return redirect()->back();
        }
    }
}
