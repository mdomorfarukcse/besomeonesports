<?php

namespace App\Http\Controllers\Administration\Role;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
}
