<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarangMasukModel;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\PenghasilanModel;
use App\Models\TargetPenghasilanModel;

class MasterDataController extends Controller
{

    public function index(){
    
    // Ambil tanggal hari ini
    $tanggal_kemarin = carbon::yesterday()->toDateString();
    $tanggal_hari_ini = Carbon::today()->toDateString();

      // Mendapatkan bulan dan tahun saat ini
      $currentMonth = Carbon::now()->month;
      $currentYear = Carbon::now()->year;

    $bulanBerjalan = Carbon::now()->month();

    // Ambil data hanya jika tanggal pada kolom 'dibuat_kapan' sama dengan tanggal hari ini
    $dataPenghasilanKemarin = PenghasilanModel::whereDate('tanggal', $tanggal_kemarin)->get();
    $datapenghasilan = PenghasilanModel::whereDate('tanggal', $tanggal_hari_ini)->get();
    

    // panggil data target model perbulan ini
    $bulanIni = Carbon::now()->format('m');
    $targetPenghasilan = TargetPenghasilanModel::whereMonth('bulan', $bulanIni)->get();
    // total pendapatan sebulan 
     // Menjumlahkan nilai dari kolom 'pemasukan' di tabel 'penghasilan' berdasarkan bulan dan tahun saat ini
    $totalPendapatanBulanIni = PenghasilanModel::whereYear('dibuat_kapan', $currentYear)
                                         ->whereMonth('dibuat_kapan', $currentMonth)
                                         ->sum('pemasukan');

    $totalPendapatanTahunIni = PenghasilanModel::whereYear('dibuat_kapan', $currentYear)
                                         ->sum('pemasukan');


    $formatIncome = number_format($totalPendapatanBulanIni, 2);
    $formatIncomeTahun = number_format($totalPendapatanTahunIni, 2);

    $dataTable  = DataBarangMasukModel::orderBy('id','desc')->paginate(5);
    $barang = DataBarangMasukModel::orderBy('id','desc')->get();
    $today      = Carbon::now()->toDateString();
    $dataToday  = DataBarangMasukModel::whereDate('tanggal_dibuat', $today)->count();
    return view('layout/master-data/index',
    compact('barang','dataToday', 
    'dataTable','datapenghasilan',
    'dataPenghasilanKemarin','formatIncome','formatIncomeTahun','targetPenghasilan'));
    }


    public function create_data_baru(Request $request)
    {   
        $aturan = 
        [
            'for_nama_barang'               => 'required',
            'stok_minimal_barang'           => 'required'
        ];

        $messages =  
        [
             'required' => 'Wajib Diisi',   
        ];

        $validator = Validator::make($request->all(), $aturan, $messages);
       try {
        
        if($validator->fails()){
            return redirect()
            ->route('master-data')
            ->withErrors($validator)->withInput();
        }else{
            $insert = DataBarangMasukModel::create([
                'Kategory'           => strtoupper ($request -> for_kategory_barang_baru),
                'nama_barang'        => $request -> for_nama_barang,
                'stok_minimal_barang'=> $request -> for_stok_minimal,
                'tanggal_dibuat'     => date('Y-m-d H:i:s'),
            ]);
    
            if($insert) {
                return redirect()->route('master-data')
                ->with('success', 'berhasil tambah barang');
            }
        }

        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('master-data')
            ->with('danger', $th->getMessage());
        }
    }


    function update(){


         // Ambil tanggal hari ini
    $tanggal_kemarin = carbon::yesterday()->toDateString();
    $tanggal_hari_ini = Carbon::today()->toDateString();

      // Mendapatkan bulan dan tahun saat ini
      $currentMonth = Carbon::now()->month;
      $currentYear = Carbon::now()->year;

    $bulanBerjalan = Carbon::now()->month();

    // Ambil data hanya jika tanggal pada kolom 'dibuat_kapan' sama dengan tanggal hari ini
    $dataPenghasilanKemarin = PenghasilanModel::whereDate('tanggal', $tanggal_kemarin)->get();
    $datapenghasilan = PenghasilanModel::whereDate('tanggal', $tanggal_hari_ini)->get();
    

    // panggil data target model perbulan ini
    $bulanIni = Carbon::now()->format('m');
    $targetPenghasilan = TargetPenghasilanModel::whereMonth('bulan', $bulanIni)->get();
    // total pendapatan sebulan 
     // Menjumlahkan nilai dari kolom 'pemasukan' di tabel 'penghasilan' berdasarkan bulan dan tahun saat ini
    $totalPendapatanBulanIni = PenghasilanModel::whereYear('dibuat_kapan', $currentYear)
                                         ->whereMonth('dibuat_kapan', $currentMonth)
                                         ->sum('pemasukan');

    $totalPendapatanTahunIni = PenghasilanModel::whereYear('dibuat_kapan', $currentYear)
                                         ->sum('pemasukan');


    $formatIncome = number_format($totalPendapatanBulanIni, 2);
    $formatIncomeTahun = number_format($totalPendapatanTahunIni, 2);

    $dataTable  = DataBarangMasukModel::orderBy('id','desc')->paginate(5);
    $barang = DataBarangMasukModel::orderBy('id','desc')->get();
    $today      = Carbon::now()->toDateString();
    $dataToday  = DataBarangMasukModel::whereDate('tanggal_dibuat', $today)->count();
    
        return view('layout/master-data/update-data-barang', 
        compact('barang','dataToday', 
        'dataTable','datapenghasilan',
        'dataPenghasilanKemarin','formatIncome','formatIncomeTahun','targetPenghasilan'));
    }


}
