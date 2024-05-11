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
     Route::get('/add-users',[UserManagemantController::class, 'create'])
     ->name('add-users');
     Route::post('/simpan/user/new',[UserManagemantController::class, 'store'])
     ->name('simpan-users');
     Route::get('/delete-user/{id}',[UserManagemantController::class, 'destroy'])
     ->name('delete-user');

     Route::post('/simpan-data-user',[SiteKaryawanController::class, 'store'])
     ->name('simpan-data-karyawan');

    //  route target penghasilan
    Route::post('/simpan/data/target',[TargetPenghasilanController::class, 'store'])
    ->name('simpan-target');
    Route::get('/Data-target',[TargetPenghasilanController::class, 'index'])
    ->name('data-target');

    
//    route site karyawan
    Route::get('/site-karyawan-145',[SiteKaryawanController::class, 'index'])
    ->name('site-karyawan');
    Route::get('/site-karyawan-145/create',[SiteKaryawanController::class, 'create'])
    ->name('tambah-karyawan');
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
    
    
    // master data route
    Route::get('/master-data',[MasterDataController::class, 'index'])
    ->name('master-data');
    
    // route modal master data
    Route::get('/tambah-data',[DataBarangBaruController::class, 'index'])
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








