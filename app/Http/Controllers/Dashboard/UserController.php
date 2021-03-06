<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function showUsers() {
        
        $users = User::paginate(20);
        return view('dashboard.users', compact('users'));
    }


    public function showOneUser($id) {
        $user = User::find($id);

        return view('dashboard.showUser', compact('user'));
    }

    public function deleteUser($id) {

        User::find($id)->delete();

        return back();
    }

    public function showEditUser($id) {

        $user = User::find($id);

        return view('dashboard.editUser', compact('user'));
        
    }


    public function makeEditUser(Request $request, $id) {

        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        if($request->is_newsletters) {
            $user->is_newsletters = 1;
        } else {
            $user->is_newsletters = 0;
        }

        $user->save();

        return back();
    }

}
