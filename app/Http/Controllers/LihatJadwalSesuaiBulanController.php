<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalAbsensiModel;
use Illuminate\Support\Facades\DB;

class LihatJadwalSesuaiBulanController extends Controller
{
    function jadwal_januari(){
     // Menetapkan bulan Januari dan tahun saat ini
     $january = 1;
     $currentYear = date('Y');
     
     // Mendapatkan pengguna yang login
     $user = Auth::user();
     $userEmail = $user->email;
     $userLevel = $user->level;
 
     // Periksa level pengguna
     if (in_array($userLevel, ['owner', 'admin'])) {
         // Jika level adalah owner atau admin, ambil semua data untuk bulan Januari
         $dataJadwal = DB::select(
             "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
              FROM data_karyawan
              LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
              WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
              AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
             [$january, $currentYear]
         );
     } else {
         // Jika level adalah user, ambil data berdasarkan email pengguna yang login
         $dataJadwal = DB::select(
             "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
              FROM data_karyawan
              LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
              WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
              AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
              AND data_karyawan.email = ?",
             [$january, $currentYear, $userEmail]
         );
     }
 
     // Memeriksa apakah ada data untuk bulan Januari
     if (empty($dataJadwal)) {
         // Jika tidak ada data untuk bulan Januari, Anda dapat mengatur $dataJadwal ke array kosong
         $dataJadwal = [];
     }
 
     return view('layout/site-karyawan/cek-jadwal/jadwal-januari', compact('dataJadwal'));
  }


function jadwal_february(){
    // Menetapkan bulan Januari dan tahun saat ini
    $february = 2;
    $currentYear = date('Y');
    
    // Mendapatkan pengguna yang login
    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        // Jika level adalah owner atau admin, ambil semua data untuk bulan Januari
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$february, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$february, $currentYear, $userEmail]
        );
    }

  
    if (empty($dataJadwal)) {
       
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-february', compact('dataJadwal'));
 }





 function jadwal_maret(){

    $maret = 3;
    $currentYear = date('Y');
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$maret, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$maret, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-maret', compact('dataJadwal'));
 }
 



 function jadwal_april(){

    $april = 4;
    $currentYear = date('Y');
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$april, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$april, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-april', compact('dataJadwal'));
 }





 function jadwal_mei(){

    $mei = 5;
    $currentYear = date('Y');
    
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$mei, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$mei, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-mei', compact('dataJadwal'));
 }


 function jadwal_juni(){

    $juni = 6;
    $currentYear = date('Y');
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$juni, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$juni, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-juni', compact('dataJadwal'));
 }


 function jadwal_juli(){

    $juli = 7;
    $currentYear = date('Y');
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$juli, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$juli, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-juli', compact('dataJadwal'));
 }


 function jadwal_agustus(){

    $agustus = 8;
    $currentYear = date('Y');
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$agustus, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$agustus, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-agustus', compact('dataJadwal'));
 }

 function jadwal_september(){

    $september = 9;
    $currentYear = date('Y');
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$september, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$september, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-september', compact('dataJadwal'));
 }


 function jadwal_oktober(){

    $oktober = 10;
    $currentYear = date('Y');
    

    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$oktober, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$oktober, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-oktober', compact('dataJadwal'));
 }


 function jadwal_november(){

    $november = 11;
    $currentYear = date('Y');
    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$november, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$november, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-november', compact('dataJadwal'));
 }


 function jadwal_december(){

    $december = 12;
    $currentYear = date('Y');
    $user = Auth::user();
    $userEmail = $user->email;
    $userLevel = $user->level;

    // Periksa level pengguna
    if (in_array($userLevel, ['owner', 'admin'])) {
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$december, $currentYear]
        );
    } else {
        // Jika level adalah user, ambil data berdasarkan email pengguna yang login
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ? 
             AND data_karyawan.email = ?",
            [$december, $currentYear, $userEmail]
        );
    }


    if (empty($dataJadwal)) {
        
        $dataJadwal = [];
    }

    return view('layout/site-karyawan/cek-jadwal/jadwal-december', compact('dataJadwal'));
 }

}



