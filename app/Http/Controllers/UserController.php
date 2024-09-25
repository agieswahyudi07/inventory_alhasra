<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function user()
    {
        try {
            $users = User::orderBy('id', 'asc')->get();
            $title = "Users";
            // dd($users);
            $data = [
                'users' => $users,
                'title' => $title,
            ];
            return view('admin/user/user', compact('data'));
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function user_create()
    {
        return view('sesi/register');
    }

    public function user_store(Request $request)
    {
        try {            
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
            $insert = User::create($data);

            return redirect()->route('admin.user');
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function user_edit($id){
        $data = User::where('id', $id)->first();
        return view('sesi/edit', compact('data'));
    }

    public function user_update(Request $request, $id){
    try {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            Session::flash('name', $request->name);
            Session::flash('email', $request->email);
            Session::flash('password', $request->password);
            Session::flash('role', $request->role);
            
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
            ],[
                'name.required' => 'Please Enter Account Name',
                'email.required' => 'Please Enter Account Email',
                'password.required' => 'Please Enter Account Password',
                'role.required' => 'Please select a role.',
            ]);
    
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $role = $request->input('role');

            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->role = $role;
            $user->save();

            return redirect()->route('admin.user');
        }else {
            Session::flash('user not found');
            return redirect()->back()->withErrors('user not found');
        }
    } catch (\Throwable $th) {
        Session::flash($th->getMessage());
        return redirect()->back()->withErrors($th->getMessage());
    }
    }
}
