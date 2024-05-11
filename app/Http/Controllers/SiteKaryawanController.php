<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteKaryawanModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class SiteKaryawanController extends Controller
{
    public function index(){


        $datakaryawan = SiteKaryawanModel::all();
        return view('layout/site-karyawan/konten-site-karyawan',compact('datakaryawan'));
    }
    public function create(){
        
        $datakaryawan = SiteKaryawanModel::all();
        return view('layout/site-karyawan/tambah-data-karyawan',compact('datakaryawan'));
    }

    function store(Request $request)
    {   
        $aturan = 
        [
            'for_nik_karyawan'           => 'required',

        ];

        $messages =  
        [
             'required' => 'Wajib Diisi',   
        ];

        $validator = Validator::make($request->all(), $aturan, $messages);
       try {
        
        if($validator->fails()){
            return redirect()
            ->route('site-karyawan')
            ->withErrors($validator)->withInput();
        }else{
            $insert = SiteKaryawanModel::create([
                'nik_karyawan'                  => strtoupper($request -> for_nik_karyawan),
                'nama'                          => $request -> for_nama_karyawan,
                'email'                         => $request -> for_email_karyawan,
                'aktif_kerja'                   => $request -> for_tgl_mulai_kerja,
                'tempat_tanggal_lahir'          => $request -> for_tgl_lahir_karyawan,
                'status_karyawan'               => $request -> for_password,
                'area_kerja'                    => $request -> for_departmant_karyawan,
                'alamat_domisili'               => $request -> for_alamat_karyawan,
            ]);
    
            if($insert) {
                return redirect()->route('site-karyawan')
                ->with('success', 'Success add user new');
            }
        }

        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('site-karyawan')
            ->with('danger', $th->getMessage());
        }
    }
}
