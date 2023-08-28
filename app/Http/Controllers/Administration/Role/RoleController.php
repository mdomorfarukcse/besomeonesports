<?php

namespace App\Http\Controllers\Administration\Role;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('administration.role.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.role.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $role = Role::create([
                'name' => $request->name,
            ]);
            toast('A New Role Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            dd($e);
            alert('Role Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('administration.role.show', compact(['role']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('administration.role.edit', compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        try {
            $role->update($request->all());
            toast('Role Has Been Updated.', 'success');
            return redirect()->route('administration.role.show', ['role' => $role]);
        } catch (Exception $e){
            dd($e);
            alert('Role update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();

            toast('Role Has Been Deleted.','success');
            return redirect()->route('administration.Role.index');
        } catch (Exception $e) {
            dd($e);
            alert('Role Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    /////// Add Role Permission All method /////////////
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('administration.role.add_roles_permission', compact('roles','permissions','permission_groups'));
    }

    public function StoreRolesPermission(Request $request)
    {
        try {
            $data = array();
            $permissions = $request->permission;
            foreach($permissions as $key => $item){
                $data['role_id'] = $request->role_id;
                $data['permission_id'] = $item;
                DB::table('role_has_permissions')->insert($data);
            }
            toast('A New Role Permission Has Been Created.', 'success');
            return redirect()->route('administration.role.all.rolepermission');
        } catch (Exception $e){
            dd($e);
            alert('Role Permission Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    public function AllRolesPermission(){
        $roles = Role::all();
        return view('administration.role.all_roles_permission', compact('roles'));
    }

    public function EditRolesPermission($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('administration.role.edit_roles_permission', compact('role','permissions','permission_groups'));
    }
    public function UpdateRolesPermission(Request $request, Role $role)
    {
        try {
            $role->update($request->all());
            toast('Role Has Been Updated.', 'success');
            return redirect()->route('administration.role.show', ['role' => $role]);
        } catch (Exception $e){
            dd($e);
            alert('Role update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    public function ShowRolesPermission($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('administration.role.show_roles_permission', compact('role','permissions','permission_groups'));
    }
}
