<?php
// app/Http/Controllers/NVKTestLogin.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NvkQuanTri;

class NVKTestLogin extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request inputs
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in using Auth facade
        $credentials = [
            'nvkTaiKhoan' => $validated['email'],
            'password' => $validated['password'],
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // Authentication failed, redirect back with an error message
            return redirect()->back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không đúng.']);
        }
    }
}