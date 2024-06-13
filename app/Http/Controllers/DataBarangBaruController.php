<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarangMasukModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\PenghasilanModel;
use App\Models\TargetPenghasilanModel;

class DataBarangBaruController extends Controller
{
    public function index(){

            // Ambil tanggal hari ini
        $tanggal_kemarin = carbon::yesterday()->toDateString();
        $tanggal_hari_ini = Carbon::today()->toDateString();

            // Mendapatkan bulan dan tahun saat ini
      $currentMonth = Carbon::now()->month;
      $currentYear = Carbon::now()->year;

         // Ambil tanggal hari ini
        $dataPenghasilanKemarin = PenghasilanModel::whereDate('tanggal', $tanggal_kemarin)->get();
        $datapenghasilan = PenghasilanModel::whereDate('tanggal', $tanggal_hari_ini)->get();
         
       // Menjumlahkan nilai dari kolom 'pemasukan' di tabel 'penghasilan' berdasarkan bulan dan tahun saat ini
            $totalPendapatanBulanIni = PenghasilanModel::whereYear('dibuat_kapan', $currentYear)
            ->whereMonth('dibuat_kapan', $currentMonth)
            ->sum('pemasukan');

        $totalPendapatanTahunIni = PenghasilanModel::whereYear('dibuat_kapan', $currentYear)
            ->sum('pemasukan');


        $formatIncome = number_format($totalPendapatanBulanIni, 2);
        $formatIncomeTahun = number_format($totalPendapatanTahunIni, 2);


        // panggil data target model perbulan ini
        $bulanIni = Carbon::now()->format('m');
        $targetPenghasilan = TargetPenghasilanModel::whereMonth('bulan', $bulanIni)->get();

        // Ambil data hanya jika tanggal pada kolom 'dibuat_kapan' sama dengan tanggal hari ini
        $dataTable  = DataBarangMasukModel::paginate(10);
        $barang = DataBarangMasukModel::all();
        $today      = Carbon::now()->toDateString();
        $dataToday  = DataBarangMasukModel::whereDate('tanggal_dibuat', $today)->count();
        return view('layout/master-data/tambah-data-baru',compact('barang','dataToday', 
        'dataTable','datapenghasilan','formatIncome','formatIncomeTahun','dataPenghasilanKemarin','targetPenghasilan'));
    }

    public function store(Request $request)
    {   
        $aturan = 
        [
            'for_nama_barang'           => 'required',
            'for_kode_barang'           => 'required|unique:data_masuk,kd_barang',

        ];

        $messages =  
        [
             'required' => 'Wajib Diisi',
             'unique'   => 'tidak boleh ada kode yang sama',   
        ];

        $validator = Validator::make($request->all(), $aturan, $messages);
       try {
        
        if($validator->fails()){
            return redirect()
            ->route('tambah-data-baru')
            ->withErrors($validator)->withInput();
        }else{
            $insert = DataBarangMasukModel::create([
                'Kategory'              => strtoupper($request -> for_kategory_barang),
                'kd_barang'             => strtoupper($request -> for_kode_barang),
                'nama_barang'           => $request -> for_nama_barang,
                'stok_minimal_barang'   => $request -> for_stok_minimal,
                'satuan'                => $request -> for_satuan,
                'stok_sisa'             => $request -> for_stok_minimal,
                'stok_masuk'            => 0,
                'stok_keluar'           => 0,
                'tanggal_dibuat'        => date('Y-m-d H:i:s'),
            ]);
    
            if($insert) {
                return redirect()->route('tambah-data-baru')
                ->with('success', 'berhasil tambah barang baru');
            }
        }

        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('tambah-data-baru')
            ->with('danger', $th->getMessage());
        }
    }
}
