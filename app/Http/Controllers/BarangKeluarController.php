<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\DataBarangMasukModel;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index_barang_keluar(Request $request)
        {

        $aturan = 

            [
            'for_input_jumlah_barang' => 'required'
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
            $cek_sisa = DataBarangMasukModel::where('Kategory', $request->form_kategory_barang)
            ->orderBy('id', 'DESC')
            ->first();

            $cek_minimal = $cek_sisa['stok_minimal_barang'];

            $stok_sisa = $cek_sisa['stok_sisa'] ?? 0;
            // jika ada sisa yang ditemukan
            if(isset($stok_sisa)){
                    //stok sisa + stok masuk baru
                    //jika yang dikeluarkan lebih besar dari stok yg ada
                    if ($request->for_jumlah_keluar_barang > $stok_sisa) {
                        return redirect()
                        ->route('master-data')
                        ->withInput()
                        ->with('danger', 'Jumlah yang dikeluarkan melebihi stok yang ada');
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
                        $keluar = $stok_sisa - $request->for_jumlah_keluar_barang;
                            $insert = DataBarangMasukModel::create([
                                'Kategory'          => strtoupper($request->form_kategory_barang),
                                'stok_masuk'        => 0,
                                'stok_keluar'       => $request->for_jumlah_keluar_barang,
                                'stok_sisa'         => $keluar,
                                'stok_minimal'      => $cek_minimal,
                                'dibuat_kapan'      => date('Y-m-d H:i:s'),
                                'diperbarui_kapan'  => date('Y-m-d H:i:s'),
                                'diperbarui_oleh'   => null,
                            ]);
                            //jika proses insert ke db berhasil
                            if ($insert) {
                                return redirect()
                                ->route('master-data')
                                ->with('success', 'Berhasil mengeluarkan barang!');
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
