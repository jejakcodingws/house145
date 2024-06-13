<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenghasilanModel;
use Carbon\Carbon;
use App\Models\AbsensiKaryawanModel;
use App\Models\SiteKaryawanModel;

class LoginController extends Controller
{
    public function index(){
        return view ('layout.login');
    }

    public function masuk(){
        $today = Carbon::today();
        $countAbsensi = AbsensiKaryawanModel::whereDate('jam_masuk', $today)->count();

        $dataKaryawanSudahAbsen = AbsensiKaryawanModel::whereDate('jam_masuk',$today)
                                                        ->pluck('nik_karyawan')
                                                        ->toArray('nik_karyawan');

        $sudahAbsen = SiteKaryawanModel::whereIn('nik_karyawan',$dataKaryawanSudahAbsen)->get();
        $belumAbsen = SiteKaryawanModel::whereNotIn('nik_karyawan',$dataKaryawanSudahAbsen)->get();


        return view ('index',compact('countAbsensi','sudahAbsen','belumAbsen'));

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
            ->with('success', 'Berhasil Login sebagai ' . Auth::user()->name);
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
        return redirect('login');
    }
}
