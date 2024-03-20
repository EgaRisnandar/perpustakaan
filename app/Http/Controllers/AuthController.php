<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required',],
            'password' => ['required'],
        ]); 
        
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required', 'min:8'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
        ]);
    }
}
