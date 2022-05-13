<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index () {
        return view('auth.login');
    }
    function store(Request $request) {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Anda Berhasil Login !');
        }
        return back()->with('error', 'email/password salah');
    }

    function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    function register () {
        return view('auth.register');
    }
    function store_register (Request $request) {
        $validasi = $request->validate(([
            'name' => 'required|max:50',
            'email' => 'required|email:dns',
            'password' => 'required|min:3'
        ]));

        $validasi['password'] = bcrypt($validasi['password']);

        $user = User::create($validasi);

        Auth::login($user);

        return redirect('/login')->with('success','Registrasi berhasil');
    }
}
