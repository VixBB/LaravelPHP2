<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'password' => $request->password
        ];

       if (Auth::attempt($data)) {
        return redirect()->route('home');
       } else {
        return redirect()->route('login')->with('failed', 'Username atau Password salah');
       }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }
}
