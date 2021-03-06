<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {

        return view('dashboard.login');
    }

    public function makeLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $arr = $request->only('email', 'password');

        if (Auth::guard('dashboard')->attempt($arr)) {
            return redirect('/dashboard/home');
        }


        return back();
    }
}
