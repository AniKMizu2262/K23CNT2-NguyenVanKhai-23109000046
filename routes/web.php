<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NVKTestLogin;
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

//nvkLogin
Route::get('/login', [NVKTestLogin::class, 'showLoginForm'])->name('login');
Route::post('/login', [NVKTestLogin::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('nvkLayouts.Admins.Master');
})->name('dashboard')->middleware('auth');


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