<?php

namespace App\Http\Controllers\Administration\UserManagement;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\UserManagement\Admin\AdminStoreRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::role('admin')->get();
        // dd(generate_password());
        return view('administration.user_management.admin.index', compact(['admins']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.user_management.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreRequest $request)
    {
        // dd($request->all());
        try {
            DB::transaction(function() use ($request) {
                $avatar = upload_avatar($request, 'avatar');

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
                $role = Role::where('name', 'admin')->firstOrFail();
                if ($role) {
                    $user->assignRole($role);
                }
            }, 5);

            toast('A New Admin Has Been Created.','success');
            return redirect()->route('administration.user.manage.admin.index');
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
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
}
