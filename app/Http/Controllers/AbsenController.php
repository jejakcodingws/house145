<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SiteKaryawanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\AbsensiKaryawanModel;

class AbsenController extends Controller
{
    public function index() {
        // Get today's date
        $today = date('Y-m-d');
        $loggedInKaryawan = Auth::user(); // Mendapatkan data karyawan yang login
        // Fetch data_karyawan as before

        $dataKaryawan = SiteKaryawanModel::where('nik_karyawan', $loggedInKaryawan->nik_karyawan)->get();
    
        // Fetch dataAbsen with filtering by today's date and include shift column from jadwal_absensi
        $dataAbsen = DB::select("
        SELECT 
            data_karyawan.nik_karyawan, 
            data_karyawan.nama, 
            absensi.hari, 
            absensi.id, 
            absensi.jam_masuk, 
            absensi.latitude, 
            absensi.longitude, 
            absensi.jam_keluar, 
            absensi.keterangan_absen, 
            absensi.status_absen, 
            absensi.device_type,
            jadwal_absensi.shift
        FROM data_karyawan
        INNER JOIN absensi ON data_karyawan.nik_karyawan = absensi.nik_karyawan
        LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
                                  AND DATE(absensi.jam_masuk) = jadwal_absensi.tgl_bln_thn
                                  AND jadwal_absensi.shift IS NOT NULL  -- Filter untuk shift yang tidak NULL
        WHERE DATE(absensi.jam_masuk) = ?
    ", [$today]);
        // Update keterangan_absen if jam_keluar is not filled
        foreach ($dataAbsen as $absen) {
            if (is_null($absen->jam_keluar)) {
                $absen->keterangan_absen = 'absen keluar belum dilakukan';
            } else {
                $absen->keterangan_absen = 'Absen Complete';
            }
        }
    
        return view('layout.absen.dashboard-absen', compact('dataKaryawan', 'dataAbsen'));
    }
    
    

    public function SimpanDataAbsen(Request $request)
    {
        $rules = [
            'for_nik_karyawan' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'device_type' => 'required',
        ];
    
        $messages = [
            'required' => 'Wajib Diisi',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        try {
            if ($validator->fails()) {
                return redirect()
                    ->route('menu-absen')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $current_time = date('H:i:s'); // Mengambil waktu saat ini dalam format jam:menit:detik
                $current_date = date('Y-m-d'); // Mengambil tanggal saat ini
    
                // Array untuk menerjemahkan hari dari bahasa Inggris ke bahasa Indonesia
                $days = [
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu',
                ];
    
                // Mengambil nama hari saat ini dalam bahasa Inggris
                $current_day = date('l');
    
                // Menerjemahkan nama hari ke bahasa Indonesia
                $current_day_indonesia = $days[$current_day];
    
                // Default values
                $keterangan_absen = 'berhasil';
                $status_absen = 'berhasil';

          
    
                // // Determine keterangan_absen and status_absen based on current time
                // if ($current_time >= '10:00:00' && $current_time < '15:00:00') {
                //     $keterangan_absen = 'masuk pagi';
                //     if ($current_time > '10:00:00') {
                //         $status_absen = 'Telat';
                //     }
                // } elseif ($current_time >= '15:00:00' && $current_time <= '22:00:00') {
                //     $keterangan_absen = 'masuk malam';
                //     if ($current_time > '15:00:00') {
                //         $status_absen = 'Telat';
                //     }
                // }
    
                // Check if the employee has already checked in for the day
                $existing_absen = AbsensiKaryawanModel::where('nik_karyawan', $request->for_nik_karyawan)
                    ->whereDate('jam_masuk', $current_date)
                    ->first();
    
                if ($existing_absen) {
                    // Update the existing entry with jam_keluar
                    $existing_absen->jam_keluar = date('Y-m-d H:i:s');
                    $existing_absen->keterangan_absen = $keterangan_absen;
                    $existing_absen->status_absen = $status_absen;
                    $existing_absen->save();
    
                    return redirect()->route('menu-absen')
                        ->with('success', 'berhasil mengupdate absen dengan jam keluar');
                } else {
                    // Create a new entry with jam_masuk

                    $tanggalToday = date('Y-m-d H:i:s');
                    $current_date = date('Y-m-d'); // Mengambil tanggal saat ini

                    $insert = AbsensiKaryawanModel::create([
                        'hari' => $current_day_indonesia, // Mengisi kolom hari secara otomatis dengan nama hari dalam bahasa Indonesia
                        'nik_karyawan' => $request->for_nik_karyawan,
                        'jam_masuk'     => date('Y-m-d H:i:s'),
                        'keterangan_absen' => $keterangan_absen,
                        'status_absen' => $status_absen,
                        'latitude' => $request->input('latitude'),
                        'longitude' => $request->input('longitude'),
                        'device_type' => $request->input('device_type'),
                        'absen_kapan'   => $tanggalToday,
                        'created_at'   => $tanggalToday,
                   

                    ]);
    
                    if ($insert) {
                        return redirect()->route('menu-absen')
                            ->with('success', 'berhasil melakukan absen masuk');
                    }
                }
            }
        } catch (\Throwable $th) {
            return redirect()
                ->route('menu-absen')
                ->with('danger', $th->getMessage());
        }
    }
    
    

    
}
