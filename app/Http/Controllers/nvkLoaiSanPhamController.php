<?php

namespace App\Http\Controllers;

use App\Models\NvkLoaiSanPham;
use Illuminate\Http\Request;

class NvkLoaiSanPhamController extends Controller
{
    // Hiển thị danh sách loại sản phẩm
    public function index()
    {
        $nvkLoaiSanPham = NvkLoaiSanPham::all();
        return view('nvkLayouts.nvkAdmin.nvkLoaiSanPham.index', compact('nvkLoaiSanPham'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('nvkLayouts.nvkAdmin.nvkLoaiSanPham.create');
    }

    // Lưu loại sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'nvkMaLoai' => 'required|string|unique:nvkLoaiSanPham,nvkMaLoai',
            'nvkTenLoai' => 'required|string',
            'nvkTrangThai' => 'required|boolean',
        ]);

        NvkLoaiSanPham::create($request->all());

        return redirect()->route('nvkLoaiSanPham.index');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $nvkLoaiSanPham = NvkLoaiSanPham::findOrFail($id);
        return view('nvkLayouts.nvkAdmin.nvkLoaiSanPham.edit', compact('nvkLoaiSanPham'));
    }

    // Cập nhật loại sản phẩm
    public function update(Request $request, $id)
    {
        $request->validate([
            'nvkMaLoai' => 'required|string|unique:nvkLoaiSanPham,nvkMaLoai,' . $id,
            'nvkTenLoai' => 'required|string',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $nvkLoaiSanPham = NvkLoaiSanPham::findOrFail($id);
        $nvkLoaiSanPham->update($request->all());

        return redirect()->route('nvkLoaiSanPham.index');
    }

    // Xóa loại sản phẩm
    public function destroy($id)
    {
        NvkLoaiSanPham::destroy($id);
        return redirect()->route('nvkLoaiSanPham.index');
    }
}