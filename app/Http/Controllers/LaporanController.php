<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenghasilanModel;
use Symfony\Component\HttpFoundation\Session\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use function Laravel\Prompts\error;
use App\Models\DataBarangMasukModel;
use App\Models\AbsensiKaryawanModel;

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


    // controller laporan barang
 
    function Rbarang() {
        // Mengambil entri terbaru dari setiap kd_barang
        $dataBarang = DB::table('data_masuk')
            ->select('data_masuk.*')
            ->join(
                DB::raw('(SELECT MAX(id) as max_id FROM data_masuk GROUP BY kd_barang) as latest_data'),
                'data_masuk.id', '=', 'latest_data.max_id'
            )
            ->get();

        return view('layout/laporan/laporan-barang/kontenRbarang', compact('dataBarang'));
    }

    function Rabsensi(Request $request) {
        $bulan = $request->input('bulan');
    
        $query = "
            SELECT absensi.nik_karyawan, absensi.absen_kapan, absensi.hari, absensi.jam_masuk, absensi.jam_keluar, absensi.status_absen, absensi.keterangan_absen, data_karyawan.nama, 
            jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn 
            FROM data_karyawan 
            INNER JOIN absensi ON data_karyawan.nik_karyawan = absensi.nik_karyawan 
            INNER JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
        ";
    
        $parameters = [];
        if ($bulan) {
            $query .= " WHERE MONTH(absensi.jam_masuk) = ? ";
            $parameters[] = $bulan;
        }
    
        $dataAbsensi = DB::select($query, $parameters);
    
        return view('layout/laporan/laporan-absensi/kontenRabsensi', compact('dataAbsensi', 'bulan'));
    }
}


