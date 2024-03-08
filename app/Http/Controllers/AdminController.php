<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role_has_permissions;
// use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:role-list|role-create'], ['only' => ['roleview', 'add_role']]);
    $this->middleware(['permission:role-delete'], ['only' => 'deleterole']);
    $this->middleware(['permission:role-assign-permission|role-update-permission'], ['only' => ['addpermision', 'assign_permissions']]);
    $this->middleware(['permission:role-list'], ['only' => 'roleview']);
  }


  public function roleview()
  {
    $addpermissions = Role::with('permissions')->get();
    return view('newrole')->with(compact('addpermissions'));
  }

  public function add_role(Request $Request)
  {
    $roles = new Role;
    $roles->name = $Request['role'];
    $roles->save();
    return redirect()->back();
  }

  public function deleterole($id)
  {
    Role::destroy($id);
    return redirect()->back();
  }

  public function addpermision($id)
  {
    $singlerole = Role::where('id', $id)->with('permissions')->first();
    $permission = Permission::get();
    return view('addpermissions')->with(compact('singlerole', 'permission'));
  }

  public function assign_permissions(Request $request, $roleid)
  {

    $request->validate([
      'permission' => 'required'
    ]);
    $role = Role::findOrFail($roleid);
    $role->syncPermissions($request->permission);
    return redirect('role');
  }

  public function logoutuser(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->back();
  }
}








