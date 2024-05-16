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
}
