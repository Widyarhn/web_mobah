<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ValidatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GabahController;

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

Route::group(['middleware' => ['guest']], function() {
    Route::get('/login', [LoginController::class, 'index'])->name('loginform'); 
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::get('/tambah-admin', [AdminController::class, 'index']);
    Route::resource('tambah-admin/admin', UserController::class);
    
    Route::get('mitra/datatable', [MitraController::class, 'datatable'])->name('mitra.datatable');
    Route::resource('mitra', MitraController::class);
    
    Route::get('validator/datatable', [ValidatorController::class, 'datatable'])->name('validator.datatable');
    Route::resource('/validator', ValidatorController::class);
    // Route::get('tambah-admin', [AdminController::class, 'index'])->name('contents.admin');
    //Gabah
    Route::get('data-gabah/datatable', [GabahController::class, 'datatable'])->name('data-gabah.datatable');
    Route::get("/pemantauan-gabah", [GabahController::class, 'monitoring']);
    Route::get("/klasifikasi-gabah", [GabahController::class, 'klasifikasi']);
    Route::get("/logout", [LoginController::class, 'logout']);
    
    Route::resource("data-gabah", GabahController::class);

});


// Route::get('tambah-admin', [AdminController::class, 'index'])->name('contents.admin');

    // Route::resource('/profile', ProfileController::class);
    // Route::get('/profile/{id}/ubah_password', [UbahPasswordController::class ,'index'])->name('ubah_password');
    // Route::post('/profile/{id}/ubah_password', [UbahPasswordController::class ,'update'])->name('update_password');
