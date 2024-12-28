<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NvkLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.nvkLogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nvkTaiKhoan' => 'required|string',
            'nvkMatKhau' => 'required|string',
        ]);

        $credentials = $request->only('nvkTaiKhoan', 'nvkMatKhau');

        if (Auth::guard('web')->attempt(['nvkTaiKhoan' => $credentials['nvkTaiKhoan'], 'password' => $credentials['nvkMatKhau'], 'nvkTrangThai' => true])) {
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withErrors([
            'nvkTaiKhoan' => 'Thông tin đăng nhập không chính xác hoặc tài khoản chưa được kích hoạt.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}