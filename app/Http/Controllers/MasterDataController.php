<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarangMasukModel;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\PenghasilanModel;

class MasterDataController extends Controller
{

    public function index(){
    
    // Ambil tanggal hari ini
    $tanggal_hari_ini = Carbon::today()->toDateString();

    // Ambil data hanya jika tanggal pada kolom 'dibuat_kapan' sama dengan tanggal hari ini
    $datapenghasilan = PenghasilanModel::whereDate('tanggal', $tanggal_hari_ini)->get();

    $dataTable  = DataBarangMasukModel::paginate(10);
    $barang     = DataBarangMasukModel::all();
    $today      = Carbon::now()->toDateString();
    $dataToday  = DataBarangMasukModel::whereDate('tanggal_dibuat', $today)->count();
    return view('layout/master-data/index',compact('barang','dataToday', 'dataTable','datapenghasilan'));
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


}
