<?php

namespace App\Http\Controllers;

use App\Models\NvkKhachHang;
use Illuminate\Http\Request;

class NvkKhachHangController extends Controller
{
    // Hiển thị danh sách khách hàng
    public function index()
    {
        $nvkKhachHang = NvkKhachHang::all();
        return view('nvkLayouts.nvkAdmin.nvkKhachHang.index', compact('nvkKhachHang'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('nvkLayouts.nvkAdmin.nvkKhachHang.create');
    }

    // Lưu khách hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'nvkMaKhachHang' => 'required|string|unique:nvkKhachHang,nvkMaKhachHang',
            'nvkTenKhachHang' => 'required|string',
            'nvkDiaChi' => 'required|string',
            'nvkSoDienThoai' => 'required|string',
            'nvkEmail' => 'required|string|email',
            'nvkGioiTinh' => 'required|boolean',
            'nvkNgaySinh' => 'required|date',
            'nvkMatKhau' => 'required|string|min:6',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $data = $request->all();
        NvkKhachHang::create($data); // Lưu bản ghi mới

        return redirect()->route('nvkKhachHang.index');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $nvkKhachHang = NvkKhachHang::findOrFail($id);
        return view('nvkLayouts.nvkAdmin.nvkKhachHang.edit', compact('nvkKhachHang'));
    }

    // Cập nhật khách hàng
    public function update(Request $request, $id)
    {
        $request->validate([
            'nvkMaKhachHang' => 'required|string|unique:nvkKhachHang,nvkMaKhachHang,' . $id,
            'nvkTenKhachHang' => 'required|string',
            'nvkDiaChi' => 'required|string',
            'nvkSoDienThoai' => 'required|string',
            'nvkEmail' => 'required|string|email',
            'nvkGioiTinh' => 'required|boolean',
            'nvkNgaySinh' => 'required|date',
            'nvkMatKhau' => 'nullable|string|min:6',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $nvkKhachHang = NvkKhachHang::findOrFail($id);
        $data = $request->all();
        if ($request->filled('nvkMatKhau')) {
            $data['nvkMatKhau'] = bcrypt($request->nvkMatKhau); // Mã hóa mật khẩu nếu có thay đổi
        }

        $nvkKhachHang->update($data);

        return redirect()->route('nvkKhachHang.index');
    }

    // Xóa khách hàng
    public function destroy($id)
    {
        NvkKhachHang::destroy($id);
        return redirect()->route('nvkKhachHang.index');
    }
}