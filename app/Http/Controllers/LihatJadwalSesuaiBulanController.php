<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LihatJadwalSesuaiBulanController extends Controller
{
    function jadwal_januari(){
        return $this->getJadwalByMonth(1);
    }

    function jadwal_february(){
        return $this->getJadwalByMonth(2);
    }

    function jadwal_maret(){
        return $this->getJadwalByMonth(3);
    }

    function jadwal_april(){
        return $this->getJadwalByMonth(4);
    }

    function jadwal_mei(){
        return $this->getJadwalByMonth(5);
    }

    function jadwal_juni(){
        return $this->getJadwalByMonth(6);
    }

    function jadwal_juli(){
        return $this->getJadwalByMonth(7);
    }

    function jadwal_agustus(){
        return $this->getJadwalByMonth(8);
    }

    function jadwal_september(){
        return $this->getJadwalByMonth(9);
    }

    function jadwal_oktober(){
        return $this->getJadwalByMonth(10);
    }

    function jadwal_november(){
        return $this->getJadwalByMonth(11);
    }

    function jadwal_desember(){
        return $this->getJadwalByMonth(12);
    }

    private function getJadwalByMonth($month){
        $currentYear = date('Y');
        
        // Ambil data jadwal untuk semua pengguna
        $dataJadwal = DB::select(
            "SELECT data_karyawan.nik_karyawan, jadwal_absensi.hari, data_karyawan.nama, jadwal_absensi.shift, jadwal_absensi.tgl_bln_thn
             FROM data_karyawan
             LEFT JOIN jadwal_absensi ON data_karyawan.nik_karyawan = jadwal_absensi.nik_karyawan
             WHERE MONTH(jadwal_absensi.tgl_bln_thn) = ? 
             AND YEAR(jadwal_absensi.tgl_bln_thn) = ?",
            [$month, $currentYear]
        );

        return view("layout/site-karyawan/cek-jadwal/jadwal-" . strtolower($this->getMonthName($month)), compact('dataJadwal'));
    }

    private function getMonthName($month){
        $months = [
            1 => 'januari',
            2 => 'february',
            3 => 'maret',
            4 => 'april',
            5 => 'mei',
            6 => 'juni',
            7 => 'juli',
            8 => 'agustus',
            9 => 'september',
            10 => 'oktober',
            11 => 'november',
            12 => 'desember',
        ];
        
        return $months[$month];
    }
}
