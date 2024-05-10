<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteKaryawanController extends Controller
{
    public function index(){
        return view('layout/site-karyawan/konten-site-karyawan');
    }
    public function create(){
        return view('layout/site-karyawan/tambah-data-karyawan');
    }
}
