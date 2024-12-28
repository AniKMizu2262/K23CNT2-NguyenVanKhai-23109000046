<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NvkLoginController;
use App\Http\Controllers\NvkQuanTriController;
use App\Http\Controllers\NvkLoaiSanPhamController;
use App\Http\Controllers\NvkSanPhamController;
use App\Http\Controllers\NvkKhachHangController;
use App\Http\Controllers\NvkHoaDonController;
use App\Http\Controllers\NvkCTHDController;

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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('nvkLayouts.Admins.Master');
});

// nvkLogin
Route::get('nvkLogin', [NvkLoginController::class, 'showLoginForm'])->name('nvkLogin');
Route::post('nvkLogin', [NvkLoginController::class, 'login']);
Route::post('nvkLogout', [NvkLoginController::class, 'logout'])->name('nvkLogout');

// nvkQuanTri
Route::resource('nvkquantri', NvkQuanTriController::class);

// nvkLoaiSanPham
Route::resource('nvkLoaiSanPham', NvkLoaiSanPhamController::class);

// nvkSanPham
Route::resource('nvkSanPham', NvkSanPhamController::class);

// nvkKhachHang
Route::resource('nvkKhachHang', NvkKhachHangController::class);

// nvkHoaDon
Route::resource('nvkHoaDon', NvkHoaDonController::class);

// nvkCTHD
Route::resource('nvkCTHD', NvkCTHDController::class);