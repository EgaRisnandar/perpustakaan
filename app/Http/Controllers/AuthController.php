<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        //$user = User::create($request->all());
        return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Login');
    }
}
