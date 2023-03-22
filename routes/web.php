<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DashboardController;


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
Route::get('/', [LoginController::class, 'index'])->name('loginform')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function (){

    // Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    // Route::get('/tambah-admin', [AdminController::class, 'index'])->name('contents.admin');
    Route::get('/tambah-admin', function () {
        return view('public.contents.admin.index');
    });
    Route::resource('tambah-admin/admin', UserController::class);
    Route::get('mitra/datatable', [MitraController::class, 'datatable'])->name('mitra.datatable');
    Route::resource('mitra', MitraController::class);

    // Route::resource('/profile', ProfileController::class);
    // Route::get('/profile/{id}/ubah_password', [UbahPasswordController::class ,'index'])->name('ubah_password');
    // Route::post('/profile/{id}/ubah_password', [UbahPasswordController::class ,'update'])->name('update_password');
});