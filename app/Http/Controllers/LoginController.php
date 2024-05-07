<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view ('layout.login');
    }

    public function masuk(){
        return view ('index');
    }


    public function authenticate(Request $request)
    {

        // var_dump($request->email);
        // var_dump($request->password);
        // die;

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard')  
            ->with('success', 'Anda Berhasil Login');
        }
 
        return back()->withErrors([
            'email' => 'Email atau Password anda salah!',
        ])->onlyInput('email');
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('layout.login');
    }
}
