<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function __construct()
  {
    $this->middleware(['permission:user-list'], ['only' => 'index']);
    $this->middleware(['permission:user-create'], ['only' => ['create', 'store']]);
    $this->middleware(['permission:user-delete'], ['only' => 'delete']);
    $this->middleware(['permission:user-assign-role|user-update-role'], ['only' => ['edit', 'update']]);
    $this->middleware(['permission:role-list'], ['only' => 'roleview']);
  }

  public function index() 
  {
    $users = User::get();
    return view('index', compact('users'));
  }

  public function create()
  {
    $roles = Role::get();
    return view('create', compact('roles'));
  }

  public function store(Request $request)
  {

    $user = new User;
    $user->name = $request['name'];
    $user->email = $request['email'];
    $user->password = Hash::make($request['password']);
    $user->syncRoles($request->roles);
    $user->save();
    return redirect()->route('user.index')->with('Created', 'User Created Successfully!');
  }

  public function edit($uid)
  {
    $user = User::where('id', $uid)->with('roles')->first();
    $roles = Role::get();
    return view('edit')->with(compact('user', 'roles'));
  }

  public function update(Request $Request, $id)
  {

    $user = User::find($id);
    $user->name = $Request->input('name');
    $user->email = $Request->input('email');
    $user->syncRoles($Request->roles);
    $user->save();
    return redirect()->route('user.index')->with('Updated', 'User Updated Successfully!');
  }

  public function delete($id)
  {
    User::destroy($id);
    return redirect()->back()->route('welcome')->with('Delete', 'User Deleted Successfully!');
  }

}
