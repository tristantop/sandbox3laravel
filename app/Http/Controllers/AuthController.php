<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $data = array (
            'title' => 'Login Page'
        ); 

        return view('index', $data);
    }

    public function cek_login(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('/')->with('success', 'Logout berhasil');
    }
}
