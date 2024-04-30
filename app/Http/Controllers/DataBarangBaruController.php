<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarangMasukModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DataBarangBaruController extends Controller
{
    public function index(){
        $barang = DataBarangMasukModel::get();
        $today      = Carbon::now()->toDateString();
        $dataToday  = DataBarangMasukModel::whereDate('tanggal_dibuat', $today)->count();
        return view('layout/master-data/tambah-data-baru',compact('barang','dataToday'));
    }

    public function store(Request $request)
    {   
        $aturan = 
        [
            'for_nama_barang'           => 'required',

        ];

        $messages =  
        [
             'required' => 'Wajib Diisi',   
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
