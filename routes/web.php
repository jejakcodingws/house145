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
    return view('index');
});


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

// user managemant
Route::get('/User-managemant',[UserManagemantController::class, 'index'])
->name('user-manage');
Route::get('/tambah/user/new',[UserManagemantController::class, 'create'])
->name('add-users');
Route::post('/simpan/user/new',[UserManagemantController::class, 'store'])
->name('simpan-users');






