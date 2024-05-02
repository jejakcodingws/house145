<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\DataBarangMasukModel;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function store(Request $request)
        {

        $aturan = 

            [
            'for_jumlah_keluar_barang' => 'required'
            ];

        $messages =  
        [
             'required' => 'Wajib Diisi',   
        ];

        $validator = Validator::make($request->all(), $aturan, $messages);

       try {
            //jika inputan user tidak sesuai dengan aturan validasi
        if($validator->fails()){
            return redirect()
            ->route('master-data')
            ->withInput()
            ->withErrors($validator)->withInput();
        }else {
            
                //jika inputan user sesuai
                //simpan ke database

                //mengambil data sisa stok terakhir di database
                //berdasarkan kode barang yang dipilih di form
            $cek_sisa = DataBarangMasukModel::where('kd_barang', $request->form_kategory_barang)
            ->orderBy('id', 'DESC')
            ->first();
     

            $stok_sisa = $cek_sisa['stok_sisa'] ?? 0;
            // jika ada sisa yang ditemukan
           
            if(isset($stok_sisa)){
                    //stok sisa + stok masuk baru
                    //jika yang dikeluarkan lebih besar dari stok yg ada
                    if ($request->for_jumlah_keluar_barang > $stok_sisa) {
                        return redirect()
                        ->route('master-data')
                        ->withInput()
                        ->with('danger', 'Jumlah yang dikeluarkan melebihi stok minimal');
                        die;
                    // $isi = $stok_sisa + $request->form_jumlah_masuk;
                }
                 //jika yg dikeluarkan lebih kecil atau sama
                else {
                     //cek jika jumlah yg dikeluarkan adalah 0 dan minus
                     if ($request->for_jumlah_keluar_barang <= 0) {
                        return redirect()
                        ->route('master-data')
                        ->withInput()
                        ->with('danger', 'Jumlah minimal barang yg bisa keluar adalah 1');
                        die;
                    }
                    else{
                        $isi_kode_barang = $cek_sisa['kd_barang'];
                        $cek_minimal = $cek_sisa['stok_minimal_barang'];
                        $isi_kategory = $cek_sisa['Kategory']?? 0;
                        $isi_nama_barang = $cek_sisa['nama_barang']?? 0;
                        $keluar = $stok_sisa - $request->for_jumlah_keluar_barang;
                        $isi_satuan = $cek_sisa['satuan']?? 0;

                            $insert = DataBarangMasukModel::create([
                                'Kategory'          => $isi_kategory,
                                'kd_barang'         => $isi_kode_barang,
                                'nama_barang'       => $isi_nama_barang,
                                'stok_masuk'        => 0,
                                'stok_keluar'       => $request->for_jumlah_keluar_barang,
                                'stok_sisa'         => $keluar,
                                'stok_minimal_barang' => $cek_minimal,
                                'satuan'            => $isi_satuan,
                                'tanggal_dibuat'      => date('Y-m-d H:i:s'),
                            ]);
                        
                            //jika proses insert ke db berhasil
                            if ($insert) {
                                return redirect()
                                ->route('master-data')
                                ->with('success', 'mengeluarkan barang!');
                            }
                        }
                    }
                }
        else{
              //jika tidak ada sisa
              return redirect()
              ->route('master-data')
              ->withInput()
              ->with('danger', 'Barang belum ada stok sama sekali');
              die;

            }
            
          }

        }
        catch (\Throwable $th){ 
            return redirect()
            ->route('master-data')
            ->withInput()
            ->with('danger', $th->getMessage());
            }
        }
}
