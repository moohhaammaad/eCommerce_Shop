<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegister() {

        return view('register');
    }

    public function makeRegister(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            're_password' => 'required',
            'address' => 'required',
            'is_newsletters' => 'nullable'
        ]);


        if ($request->password != $request->re_password) {
            return back()->withErrors(['Error' => 'Passwords should matches']);
        }

        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->address  = $request->address;
        $user->email    =  $request->email;
        $user->is_newsletters = $request->is_newsletters?  1 : 0;
        $user->save();


        return redirect('/login')->with('success', "Registered Successfully");
    }


    public function showLogin() {
        return view('login');
    }

    public function makeLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $arr = $request->only('email', 'password');

        if(Auth::attempt($arr)) {
            return redirect()->intended('/');
        }

        return back();
    }
}
