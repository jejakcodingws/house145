<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenghasilanModel;
use Symfony\Component\HttpFoundation\Session\Session;

class LaporanController extends Controller
{
    public function index(){
        return view('layout/laporan/konten-index');
    }

    public function Rpendapatan(){
        $dataLaporan = PenghasilanModel::all();
        return view('layout/laporan/kontenRpendapatan',compact('dataLaporan'));
    }

    public function filter(Request $request)
{
    $bulan = $request->input('bulan');

    // Ambil data sesuai dengan bulan yang dipilih
    $dataLaporan = PenghasilanModel::whereMonth('tanggal', $bulan)
                     ->whereYear('tanggal', date('Y')) // Ambil hanya tahun saat ini
                     ->get();
    // Lakukan hal lain yang diperlukan, misalnya menghitung total pemasukan kembali

    return view('layout/laporan/filterRpendapatan', compact('dataLaporan'));
}

}
