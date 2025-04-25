<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin', $admin->id);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function dashboard()
    {
        if (!Session::has('admin')) {
            return redirect('/login');
        }

        return view('dashboard');
    }

    public function logout()
    {
        Session::forget('admin');
        return redirect('/login');
    }
}
