<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenghasilanModel;
use Symfony\Component\HttpFoundation\Session\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use function Laravel\Prompts\error;

class LaporanController extends Controller
{
    public function index(){
        return view('layout/laporan/konten-index');
    }

    public function Rpendapatan(Request $request){

        $bulan = $request->input('bulan');
        $dataLaporan = PenghasilanModel::all();
        return view('layout/laporan/kontenRpendapatan',compact('dataLaporan','bulan'));
    }
    public function filter(Request $request)
    {
        $bulan = $request->input('bulan');

        // Ambil data sesuai dengan bulan yang dipilih
        $dataLaporan = PenghasilanModel::whereMonth('tanggal', $bulan)
                         ->whereYear('tanggal', date('Y')) // Ambil hanya tahun saat ini
                         ->get();

        return view('layout/laporan/filterRpendapatan', compact('dataLaporan', 'bulan'));
    }

    public function downloadPDF(Request $request)
    {
        $bulan = $request->input('bulan');

        // Ambil data sesuai dengan bulan yang dipilih
        $dataLaporan = PenghasilanModel::whereMonth('tanggal', $bulan)
                         ->whereYear('tanggal', date('Y')) // Ambil hanya tahun saat ini
                         ->get();

        $pdf = Pdf::loadView('layout/laporan/generateLaporanToPDF', compact('dataLaporan', 'bulan'));
        return $pdf->download('bulan'.$bulan.'laporan.pdf');
    }
}
