<?php

use Illuminate\Support\Facades\Route;
use function Illuminate\Filesystem\name;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\DataBarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DataBarangBaruController;
use App\Http\Controllers\UserManagemantController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendapatanController;
use App\Http\Middleware\CekLevel;
use App\Http\Controllers\TargetPenghasilanController;
use Symfony\Component\HttpKernel\HttpCache\Store;
use App\Http\Controllers\SiteKaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LihatJadwalSesuaiBulanController;
use App\Http\Controllers\AbsenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.login');
});

Route::group(['middleware' => ['auth','CekLevel:admin,owner']], function(){

     // user managemant
     Route::get('/User-managemant',[UserManagemantController::class, 'index'])
     ->name('user-manage');
     Route::get('User-managemant/add-users',[UserManagemantController::class, 'create'])
     ->name('add-users');
     Route::get('User-managemant/data-users',[UserManagemantController::class, 'data_user'])
     ->name('data-user');   
     Route::post('User-Managemant/simpan/user/new',[UserManagemantController::class, 'store'])
     ->name('simpan-users');
     Route::get('User-managemant/delete-user/{id}',[UserManagemantController::class, 'destroy'])
     ->name('delete-user');

     

    //  route target penghasilan
    Route::post('/simpan/data/target',[TargetPenghasilanController::class, 'store'])
    ->name('simpan-target');
    Route::get('User-managemant/Data-target',[TargetPenghasilanController::class, 'index'])
    ->name('data-target');

    // route laporan 
    Route::get('/laporan',[LaporanController::class, 'index'])
    ->name('laporan');
    Route::get('/laporan/laporan-pendapatan',[LaporanController::class, 'Rpendapatan'])
    ->name('Rpendapatan');
    Route::get('/laporan/laporan-pendapatan/filter',[LaporanController::class, 'filter'])
    ->name('filterRpendapatan');
    Route::post('/laporan/laporan-pendapatan/downloadPDF',[LaporanController::class, 'downloadPDF'])
    ->name('downloadPDF');
    Route::get('/laporan/laporan-barang',[LaporanController::class, 'Rbarang'])
    ->name('Rbarang');
    Route::get('/laporan/laporan-barang',[LaporanController::class, 'Rbarang'])
    ->name('Rbarang');
    Route::get('/laporan/laporan-absensi',[LaporanController::class, 'Rabsensi'])
    ->name('Rabsensi');
});



Route::group(['middleware' => ['auth','CekLevel:admin,owner,karyawan']], function(){
    Route::get('/cafe145/master-menu',[CafeController::class, 'index'])
    ->name('master-menu-cafe');
    
    Route::get('/cafe145/master-menu/invoice',[InvoiceController::class, 'index'])
    ->name('menu-invoice');
    
    Route::get('/cafe145/master-menu/invoice/simpanpdf/{id}',[InvoiceController::class, 'show'])
    ->name('simpanpdf');
    
    Route::get('/cafe145/master-menu/invoice/form-input/',[InvoiceController::class, 'create'])
    ->name('form-invoice');
    
    Route::post('/cafe145/master-menu/invoice/form-input/simpan',[InvoiceController::class, 'store'])
    ->name('simpan-invoice');
    
    Route::get('/cafe145/master-menu/invoice/download/{id}',[PDFController::class, 'downloadpdf'])
    ->name('downloadpdf');
    

    // route search form 
    Route::get('/site-karyawan-145/search',[SiteKaryawanController::class, 'search'])
    ->name('search');
        
    //    route site karyawan
    Route::get('/site-karyawan-145',[SiteKaryawanController::class, 'index'])
    ->name('site-karyawan');
    Route::get('/site-karyawan-145/dashboard-karyawan',[SiteKaryawanController::class, 'dashboard'])
    ->name('dashboard-karyawan');
    Route::get('/site-karyawan-145/data-karyawan',[SiteKaryawanController::class, 'data_karyawan'])
    ->name('data-karyawan');
    Route::get('/site-karyawan-145/create',[SiteKaryawanController::class, 'create'])
    ->name('tambah-karyawan');
     // simpan presensi karyawan
     Route::get('/site-karyawan-145/create-absensi',[SiteKaryawanController::class, 'form_absensi'])
     ->name('tambah-data-absensi');
     Route::post('/siite-karyawan-145/simpan-absensi',[SiteKaryawanController::class, 'simpan_data_absensi'])
     ->name('simpan-jadwal-absensi');
     Route::get('/site-karyawan-145/jadwal',[SiteKaryawanController::class, 'cek_jadwal'])
     ->name('cek-jadwal');
     Route::post('/simpan-data-user',[SiteKaryawanController::class, 'store'])
     ->name('simpan-data-karyawan');

    //  route menu absen
    Route::get('/absen',[AbsenController::class, 'index'])->name('menu-absen');
    Route::post('/absen-store',[AbsenController::class, 'SimpanDataAbsen'])->name('simpan-data-absensi');
   
    //  route lihat jadwal berdasarkan bulan input
    Route::get('site-karyawan-145/lihat-jadwal/januari',[LihatJadwalSesuaiBulanController::class, 'jadwal_januari'])
    ->name('jadwal-januari');
    Route::get('site-karyawan-145/lihat-jadwal/february',[LihatJadwalSesuaiBulanController::class, 'jadwal_february'])
    ->name('jadwal-february');
    Route::get('site-karyawan-145/lihat-jadwal/maret',[LihatJadwalSesuaiBulanController::class, 'jadwal_maret'])
    ->name('jadwal-maret');
    Route::get('site-karyawan-145/lihat-jadwal/april',[LihatJadwalSesuaiBulanController::class, 'jadwal_april'])
    ->name('jadwal-april');
    Route::get('site-karyawan-145/lihat-jadwal/mei',[LihatJadwalSesuaiBulanController::class, 'jadwal_mei'])
    ->name('jadwal-mei');
    Route::get('site-karyawan-145/lihat-jadwal/juni',[LihatJadwalSesuaiBulanController::class, 'jadwal_juni'])
    ->name('jadwal-juni');
    Route::get('site-karyawan-145/lihat-jadwal/juli',[LihatJadwalSesuaiBulanController::class, 'jadwal_juli'])
    ->name('jadwal-juli');
    Route::get('site-karyawan-145/lihat-jadwal/agustus',[LihatJadwalSesuaiBulanController::class, 'jadwal_agustus'])
    ->name('jadwal-agustus');
    Route::get('site-karyawan-145/lihat-jadwal/september',[LihatJadwalSesuaiBulanController::class, 'jadwal_september'])
    ->name('jadwal-september');
    Route::get('site-karyawan-145/lihat-jadwal/oktober',[LihatJadwalSesuaiBulanController::class, 'jadwal_oktober'])
    ->name('jadwal-oktober');
    Route::get('site-karyawan-145/lihat-jadwal/november',[LihatJadwalSesuaiBulanController::class, 'jadwal_november'])
    ->name('jadwal-november');
    Route::get('site-karyawan-145/lihat-jadwal/december',[LihatJadwalSesuaiBulanController::class, 'jadwal_december'])
    ->name('jadwal-december');
    
    // master data route
    Route::get('/master-data',[MasterDataController::class, 'index'])
    ->name('master-data');
    
    // route modal master data
    Route::get('/master-data/tambah-data',[DataBarangBaruController::class, 'index'])
    ->name('tambah-data-baru');
    
    Route::post('/simpan-data',[DataBarangBaruController::class, 'store'])
    ->name('simpan-data-baru');
    
    Route::post('/simpan-data-input',[DataBarangMasukController::class, 'store'])
    ->name('simpan-data-masuk');
    
    Route::post('/simpan-data-keluar',[BarangKeluarController::class, 'store'])
    ->name('simpan-barang-keluar');
    
    // route pendapatan 
    Route::post('/simpan-pendapatan',[PendapatanController::class, 'store'])
    ->name('simpan-pendapatan')
   ;

   
});





Route::get('/login',[LoginController::class, 'index'])
->name('login');

Route::get('/dashboard',[LoginController::class, 'masuk'])
->name('masuk')
->middleware('auth');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::post('/login',[LoginController::class, 'authenticate'])
->name('enter-login');








