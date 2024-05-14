<?php

namespace App\Http\Controllers\Administration\Role;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

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
            return redirect()->route('administration.role.edit.rolepermission', ['id' => $role->id]);
        } catch (Exception $e){
            //dd($e);
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
            //dd($e);
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
            return redirect()->route('administration.role.index');
        } catch (Exception $e) {
            //dd($e);
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
        // dd($request);
        try {
            $data = [];
            $permissions = $request->permission;
            foreach($permissions as $key => $item){
                $data['role_id'] = $request->role_id;
                $data['permission_id'] = $item;
                DB::table('role_has_permissions')->insert($data);
            }
            toast('A New Role Permission Has Been Created.', 'success');
            return redirect()->route('administration.role.all.rolepermission');
        } catch (Exception $e){
            //dd($e);
            alert('Role Permission Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    public function AllRolesPermission(){
        $roles = Role::with(['permissions'])->get();
        return view('administration.role.all_roles_permission', compact('roles'));
    }

    public function EditRolesPermission($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('administration.role.edit_roles_permission', compact('role','permissions','permission_groups'));
    }
    public function UpdateRolesPermission(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);
            $permissions = $request->permission;
            if(!empty($permissions)){
                $role->syncPermissions($permissions);
            }
            toast('Role Permission Has Been Updated.', 'success');
            return redirect()->route('administration.role.all.rolepermission', ['role' => $role]);
        } catch (Exception $e){
            //dd($e);
            alert('Role Permission update Failed!', 'There is some error! Please fix and try again.', 'error');
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
    public function DestroyRolesPermission($id)
    {
        try {
            $role = Role::findOrFail($id);
            if(!is_null($role)){
                $role->delete();
            }
            toast('Role Permission Has Been Deleted.','success');
            return redirect()->route('administration.role.all.rolepermission');
        } catch (Exception $e) {
            //dd($e);
            alert('Role Permission Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
