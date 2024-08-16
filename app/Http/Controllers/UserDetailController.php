<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Events\UserCreated;


class UserDetailController extends Controller
{
    public function usershow()
    {
        $usersshow = User::get();
        return view('pusherdataShow', compact('usersshow'));

    }
    public function useradd(Request $request)
    {
        $user = new User;
        $user->name = $request['username'];
        $user->email = $request['useremail'];
        $user->password = Hash::make($request['userpassword']);
        $user->save();
        // event(new UserCreated($user));
        return redirect()->back();
    }
}
