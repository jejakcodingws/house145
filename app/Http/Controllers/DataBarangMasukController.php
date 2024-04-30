<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\DataBarangMasukModel;

class DataBarangMasukController extends Controller
{
    public function store(Request $request)
    {   
        $aturan = 
        [
            'for_input_jumlah_barang'   => 'required'

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

               //jika inputan user sesuai
                //simpan ke database

                //mengambil data sisa stok terakhir di database
                //berdasarkan kode barang yang dipilih di form
                $cek_sisa = DataBarangMasukModel::where('kd_barang', $request->for_kategory_barang)
                ->orderBy('id', 'DESC')
                ->first();
    
                $stok_sisa = $cek_sisa['stok_sisa']?? 0;
    
                $stok_minimal = $cek_sisa['stok_minimal_barang']?? 0;

                $isi_kode_barang = $cek_sisa['kd_barang']?? 0;

                $isi_satuan = $cek_sisa['satuan']?? 0;

                $isi_nama_barang = $cek_sisa['nama_barang']?? 0;
    
                // jika ada sisa yang ditemukan
                if(isset($stok_sisa)){

                    $isi = $stok_sisa + $request->for_input_jumlah_barang;
                }else {
                        //jika tidak ada sisa
                        //stok sisa mengambil dari data jumlah barang yg masuk
                    $isi = $request->for_input_jumlah_barang;
    
                }

                $isi_sisa = $stok_sisa + $request -> for_input_jumlah_barang;

            $insert = DataBarangMasukModel::create([
                'Kategory'              => strtoupper($request -> for_kategory_barang),
                'kd_barang'             => $isi_kode_barang,
                'nama_barang'           => $isi_nama_barang,
                'qty_barang'            => $request -> for_input_jumlah_barang,
                'stok_sisa'             => $isi_sisa,
                'stok_masuk'            => $request -> for_input_jumlah_barang,
                'stok_keluar'           => 0,
                'satuan'                => $isi_satuan,
                'stok_minimal_barang'   => $stok_minimal,
                'tanggal_dibuat'        => date('Y-m-d H:i:s'),
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
