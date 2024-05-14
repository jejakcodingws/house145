<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteKaryawanModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalAbsensiModel;
use Illuminate\Support\Facades\DB;

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
                'status_karyawan'               => $request -> for_status_karyawan,
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


    function form_absensi(){
        $datakaryawan = SiteKaryawanModel::all();
        return view('layout/site-karyawan/create-absensi',compact('datakaryawan'));
    }

    function simpan_data_absensi(Request $request)
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
            $insert = JadwalAbsensiModel::create([
                'nik_karyawan'                  => strtoupper($request -> for_nik_karyawan),
                'hari'                          => $request -> for_hari,
                'tgl_bln_thn'                   => $request -> for_tgl_bln_thn,
                'shift'                         => $request -> for_shift,
                'dibuat_kapan'                  => date('Y-m-d H:i:s'),
                'dibuat_oleh'                   => Auth::user()->name,
                
            ]);
    
            if($insert) {
                return redirect()->route('site-karyawan')
                ->with('success', 'Berhasil simpan jadwal');
            }
        }

        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('site-karyawan')
            ->with('danger', $th->getMessage());
        }
    }

    function cek_jadwal(){
             $datakaryawan = SiteKaryawanModel::all();
             // $barang = MasterBarangModel::where(['id' => $id])->first();
             $dataJadwal = DB::select(
                "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
                FROM data_karyawan
                LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan;"
            );
    
        return view('layout/site-karyawan/cek-jadwal',compact('dataJadwal','datakaryawan'));
    }

    function data_karyawan(){
        $datakaryawan = SiteKaryawanModel::all();
        return view('layout.site-karyawan.data-karyawan',compact('datakaryawan'));
    }

    function dashboard(){
        $datakaryawan = SiteKaryawanModel::all();
        return view('layout.site-karyawan.konten-dashboard-site-karyawan',compact('datakaryawan'));
    }
}
