<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SesiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class SesiController extends Controller
{

    public function index()
    {
        return view('sesi/login');
    }

    public function login(Request $request)
    {
        try {
            Session::flash('email', $request->email);
    
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ], [
                'email.required' => 'Please fill the email.',
                'password.required' => 'Please fill the password.',
            ]);
    
            $login = [
                'email' => $request->email,
                'password' => $request->password,
            ];
    
            if (Auth::attempt($login)) {
    
                if (Auth::user()->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->role == 'user') {
                    return redirect()->route('user.dashboard');
                }
            } else {
                return redirect()->route('login')->withErrors("Email or Password Doesn't Match with the Database");
            }
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->route('login')->withErrors($th->getMessage());
                }
    }

    public function logout()
    {        
        Auth::logout();
        return redirect()->route('login');
    }
}
