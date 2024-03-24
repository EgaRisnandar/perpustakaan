<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login', [
            
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/home');
        } else {
            return back()->withErrors(['username' => 'Username or password is incorrect']);
        }
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

        // Simpan data user ke database
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Login');

        
    }

    public function logout(Request $request)
    {
        Auth::logout();


        return redirect('/');
    }
}