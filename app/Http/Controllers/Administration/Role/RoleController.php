<?php

namespace App\Http\Controllers\Administration\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $permission = Permission::all();
        return view('administration.permision.index', compact('permission'));
    }
}
