<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function user()
    {

        $users = User::orderBy('id', 'asc')->get();
        $title = "Users";
        // dd($users);
        $data = [
            'users' => $users,
            'title' => $title,
        ];


        return view('admin/user/user', compact('data'));
    }

    public function user_create()
    {
        return view('sesi/register');
    }

    public function user_store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('role', $request->role);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,user',
        ], [
            'name.required' => 'Please Enter Account Name',
            'email.required' => 'Please Enter Account Email',
            'password.required' => 'Please Enter Account Password',
            'role.required' => 'Please select a role.',
            'role.in' => 'Please select a role.',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ];
        // dd($data);
        $insert = User::create($data);
        // dd($insert);


        return redirect()->route('admin.user');
    }
}
