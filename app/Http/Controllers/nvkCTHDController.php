<?php

namespace App\Http\Controllers;

use App\Models\NvkCTHD;
use App\Models\NvkHoaDon;
use App\Models\NvkSanPham;
use Illuminate\Http\Request;

class NvkCTHDController extends Controller
{
    // Hiển thị danh sách chi tiết hóa đơn
    public function index()
    {
        $nvkCTHD = NvkCTHD::with(['hoaDon', 'sanPham'])->get();
        return view('nvkLayouts.nvkAdmin.nvkCTHD.index', compact('nvkCTHD'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        $nvkHoaDon = NvkHoaDon::all();
        $nvkSanPham = NvkSanPham::all();
        return view('nvkLayouts.nvkAdmin.nvkCTHD.create', compact('nvkHoaDon', 'nvkSanPham'));
    }

    // Lưu chi tiết hóa đơn mới
    public function store(Request $request)
    {
        $request->validate([
            'nvkMaHoaDon' => 'required|string',
            'nvkMaSanPham' => 'required|string',
            'nvkSoLuong' => 'required|integer',
            'nvkDonGia' => 'required|numeric',
            'nvkThanhTien' => 'required|numeric',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $data = $request->all();
        NvkCTHD::create($data); // Lưu bản ghi mới

        return redirect()->route('nvkCTHD.index');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $nvkCTHD = NvkCTHD::findOrFail($id);
        $nvkHoaDon = NvkHoaDon::all();
        $nvkSanPham = NvkSanPham::all();
        return view('nvkLayouts.nvkAdmin.nvkCTHD.edit', compact('nvkCTHD', 'nvkHoaDon', 'nvkSanPham'));
    }

    // Cập nhật chi tiết hóa đơn
    public function update(Request $request, $id)
    {
        $request->validate([
            'nvkMaHoaDon' => 'required|string',
            'nvkMaSanPham' => 'required|string',
            'nvkSoLuong' => 'required|integer',
            'nvkDonGia' => 'required|numeric',
            'nvkThanhTien' => 'required|numeric',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $nvkCTHD = NvkCTHD::findOrFail($id);
        $nvkCTHD->update($request->all());

        return redirect()->route('nvkCTHD.index');
    }

    // Xóa chi tiết hóa đơn
    public function destroy($id)
    {
        NvkCTHD::destroy($id);
        return redirect()->route('nvkCTHD.index');
    }
}