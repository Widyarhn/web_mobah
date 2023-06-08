<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataLandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GabahController;
use App\Http\Controllers\Data\DataGabahController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LaporanController;

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
// Route::get('/', [LoginController::class, 'index'])->name('loginform')->middleware('guest');
// Route::post('/', [LoginController::class, 'authenticate'])->name('login');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index']);
Route::get('gabah-landing/datatable', [DataLandingController::class, 'datatable'])->name('gabah-landing.datatable');

Route::group(['middleware' => ['guest']], function() {
    Route::get('/login', [LoginController::class, 'index'])->name('loginform'); 
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::get('tambah-admin/datatable', [AdminController::class, 'datatable'])->name('tambah-admin.datatable');
    Route::resource('tambah-admin', AdminController::class);
    
    Route::get('mitra/datatable', [MitraController::class, 'datatable'])->name('mitra.datatable');
    Route::get('/mitra', [MitraController::class, 'index']);
    Route::resource('tambah-mitra/mitra', UserController::class);
    
    //Gabah
    // Route::post('data-gabah/{id?}/update', [DataGabahController::class, 'update'])->name('data-gabah.update');
    Route::get('data-gabah/datatable', [DataGabahController::class, 'datatable'])->name('data-gabah.datatable');
    Route::get('data-gabah/detailtable', [DataGabahController::class, 'detailtable'])->name('data-gabah.detailtable');
    
    Route::resource('data-gabah', DataGabahController::class);
    
    Route::get("/pemantauan-gabah", [GabahController::class, 'monitoring']);
    Route::get("/estimasi-gabah", [GabahController::class, 'estimasi']);
    Route::resource('gabah', GabahController::class);
    
    
    Route::get("/logout", [LoginController::class, 'logout']);
    
    
    Route::resource("/profil", ProfilController::class);

    Route::get('/laporan/cetak_pdf', [LaporanController::class, 'cetak_pdf']);
    Route::resource("/laporan", LaporanController::class);
});


// Route::get('tambah-admin', [AdminController::class, 'index'])->name('contents.admin');
    // Route::resource('/profile', ProfileController::class);
    // Route::get('/profile/{id}/ubah_password', [UbahPasswordController::class ,'index'])->name('ubah_password');
    // Route::post('/profile/{id}/ubah_password', [UbahPasswordController::class ,'update'])->name('update_password');