<?php

namespace App\Http\Controllers;

use App\Models\NvkSanPham;
use App\Models\NvkLoaiSanPham;
use Illuminate\Http\Request;

class NvkSanPhamController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $nvkSanPham = NvkSanPham::with('loaiSanPham')->get();
        return view('nvkLayouts.nvkAdmin.nvkSanPham.index', compact('nvkSanPham'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        $nvkLoaiSanPham = NvkLoaiSanPham::all();
        return view('nvkLayouts.nvkAdmin.nvkSanPham.create', compact('nvkLoaiSanPham'));
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'nvkMaSanPham' => 'required|string|unique:nvkSanPham,nvkMaSanPham',
            'nvkTenSanPham' => 'required|string',
            'nvkHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nvkSoLuong' => 'required|integer',
            'nvkDonGia' => 'required|numeric',
            'nvkMaLoai' => 'required|string',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $data = $request->all();
        if ($request->hasFile('nvkHinhAnh')) {
            $file = $request->file('nvkHinhAnh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['nvkHinhAnh'] = $filename;
        }

        NvkSanPham::create($data);

        return redirect()->route('nvkSanPham.index');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $nvkSanPham = NvkSanPham::findOrFail($id);
        $nvkLoaiSanPham = NvkLoaiSanPham::all();
        return view('nvkLayouts.nvkAdmin.nvkSanPham.edit', compact('nvkSanPham', 'nvkLoaiSanPham'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $request->validate([
            'nvkMaSanPham' => 'required|string|unique:nvkSanPham,nvkMaSanPham,' . $id,
            'nvkTenSanPham' => 'required|string',
            'nvkHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nvkSoLuong' => 'required|integer',
            'nvkDonGia' => 'required|numeric',
            'nvkMaLoai' => 'required|string',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $nvkSanPham = NvkSanPham::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('nvkHinhAnh')) {
            // Xóa ảnh cũ nếu có
            if ($nvkSanPham->nvkHinhAnh && file_exists(public_path('images/' . $nvkSanPham->nvkHinhAnh))) {
                unlink(public_path('images/' . $nvkSanPham->nvkHinhAnh));
            }
            $file = $request->file('nvkHinhAnh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['nvkHinhAnh'] = $filename;
        }

        $nvkSanPham->update($data);

        return redirect()->route('nvkSanPham.index');
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $nvkSanPham = NvkSanPham::findOrFail($id);
        if ($nvkSanPham->nvkHinhAnh && file_exists(public_path('images/' . $nvkSanPham->nvkHinhAnh))) {
            unlink(public_path('images/' . $nvkSanPham->nvkHinhAnh));
        }
        $nvkSanPham->delete();
        return redirect()->route('nvkSanPham.index');
    }
}