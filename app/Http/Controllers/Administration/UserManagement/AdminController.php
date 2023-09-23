<?php

namespace App\Http\Controllers\Administration\UserManagement;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\UserManagement\Admin\AdminStoreRequest;
use App\Http\Requests\Administration\UserManagement\Admin\AdminUpdateRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::role('admin')->get();
        $firstAdmin = User::role('admin')->orderBy('created_at')->first();
        // dd($firstAdmin);
        return view('administration.user_management.admin.index', compact(['admins', 'firstAdmin']));
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
                $avatar = upload_image($request, 'avatar');

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
    public function show(User $admin)
    {
        return view('administration.user_management.admin.show', compact(['admin']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('administration.user_management.admin.edit', compact(['admin']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, User $admin)
    {
        // dd($request->all(), $admin);
        try {
            DB::transaction(function() use ($request, $admin) {
                $avatar = upload_image($request, 'avatar');

                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->birthdate = $request->birthdate;
                $admin->contact_number = $request->contact_number;
                $admin->city = $request->city;
                $admin->state = $request->state;
                $admin->postal_code = $request->postal_code;
                $admin->address = $request->address;
                $admin->avatar = $avatar;

                $admin->save();
            }, 5);

            toast('Admin Information Has Been Updated.','success');
            return redirect()->route('administration.user.manage.admin.index');
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        try {
            $firstAdmin = User::role('admin')->orderBy('created_at')->first();
            if (auth()->user()->id === $admin->id) {
                toast('You cannot delete yourself.','warning');
                return redirect()->back();
            } elseif ($admin->id === $firstAdmin->id) {
                toast('You are not authorized to delete this Admin.','warning');
                return redirect()->back();
            } else {
                $admin->delete();
            }

            toast('Admin Has Been Deleted.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            throw new Exception($e->getMessage());
            return redirect()->back();
        }
    }
}
