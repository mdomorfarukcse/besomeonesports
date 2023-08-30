<?php

namespace App\Http\Controllers\Administration\Permission;

use Exception;
use Illuminate\Http\Request;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('administration.permission.index', compact(['permissions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $permission = Permission::create([
                'name' => $request->name,
                'group_name' => $request->group_name
            ]);
            toast('A New Permission Has Been Created.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            dd($e);
            alert('Permission Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('administration.permission.show', compact(['permission']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('administration.permission.edit', compact(['permission']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        try {
            $permission->update($request->all());
            toast('Permission Has Been Updated.', 'success');
            return redirect()->route('administration.permission.show', ['permission' => $permission]);
        } catch (Exception $e){
            dd($e);
            alert('Permission update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();

            toast('Permission Has Been Deleted.','success');
            return redirect()->route('administration.permission.index');
        } catch (Exception $e) {
            dd($e);
            alert('Permission Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    public function import(){
        return view('administration.permission.import');
    }

    public function export(){
        return Excel::download(new PermissionExport, 'Permission.xlsx');
    }

    public function import_permission(Request $request){
        try {
            Excel::import(new PermissionImport, $request->file('import_file'));
        
            toast('Permission Has Been Imported.','success');
            return redirect()->route('administration.permission.index');
        } catch (Exception $e) {
            dd($e);
            alert('Permission Import Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
        
    }
}
