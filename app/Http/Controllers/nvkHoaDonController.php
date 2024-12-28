<?php

namespace App\Http\Controllers;

use App\Models\NvkHoaDon;
use App\Models\NvkKhachHang;
use Illuminate\Http\Request;

class NvkHoaDonController extends Controller
{
    // Hiển thị danh sách hóa đơn
    public function index()
    {
        $nvkHoaDon = NvkHoaDon::with('khachHang')->get();
        return view('nvkLayouts.nvkAdmin.nvkHoaDon.index', compact('nvkHoaDon'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        $nvkKhachHang = NvkKhachHang::all();
        return view('nvkLayouts.nvkAdmin.nvkHoaDon.create', compact('nvkKhachHang'));
    }

    // Lưu hóa đơn mới
    public function store(Request $request)
    {
        $request->validate([
            'nvkMaHoaDon' => 'required|string|unique:nvkHoaDon,nvkMaHoaDon',
            'nvkMaKhachHang' => 'required|string',
            'nvkNgayLap' => 'required|date',
            'nvkTongTien' => 'required|numeric',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $data = $request->all();
        NvkHoaDon::create($data); // Lưu bản ghi mới

        return redirect()->route('nvkHoaDon.index');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $nvkHoaDon = NvkHoaDon::findOrFail($id);
        $nvkKhachHang = NvkKhachHang::all();
        return view('nvkLayouts.nvkAdmin.nvkHoaDon.edit', compact('nvkHoaDon', 'nvkKhachHang'));
    }

    // Cập nhật hóa đơn
    public function update(Request $request, $id)
    {
        $request->validate([
            'nvkMaHoaDon' => 'required|string|unique:nvkHoaDon,nvkMaHoaDon,' . $id,
            'nvkMaKhachHang' => 'required|string',
            'nvkNgayLap' => 'required|date',
            'nvkTongTien' => 'required|numeric',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $nvkHoaDon = NvkHoaDon::findOrFail($id);
        $nvkHoaDon->update($request->all());

        return redirect()->route('nvkHoaDon.index');
    }

    // Xóa hóa đơn
    public function destroy($id)
    {
        NvkHoaDon::destroy($id);
        return redirect()->route('nvkHoaDon.index');
    }
}