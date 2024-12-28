<?php
namespace App\Http\Controllers;

use App\Models\NvkQuanTri;
use Illuminate\Http\Request;

class NvkQuanTriController extends Controller
{
    // Hiển thị danh sách quản trị
    public function index()
    {
        $nvkQuanTri = NvkQuanTri::all();
        return view('nvkLayouts.nvkAdmin.nvkQuanTri.index', compact('nvkQuanTri'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('nvkLayouts.nvkAdmin.nvkQuanTri.create');
    }

    // Lưu quản trị mới
    public function store(Request $request)
    {
        $request->validate([
            'nvkTaiKhoan' => 'required|string|unique:nvkQuanTri,nvkTaiKhoan',
            'nvkMatKhau' => 'required|string',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $data = $request->all();
        $data['nvkMatKhau'] = bcrypt($data['nvkMatKhau']); // Mã hóa mật khẩu trước khi lưu

        NvkQuanTri::create($data); // Lưu bản ghi mới

        return redirect()->route('nvkquantri.index');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $nvkQuanTri = NvkQuanTri::findOrFail($id);
        return view('nvkLayouts.nvkAdmin.nvkQuanTri.edit', compact('nvkQuanTri'));
    }

    // Cập nhật quản trị
    public function update(Request $request, $id)
    {
        $request->validate([
            'nvkTaiKhoan' => 'required|string|unique:nvkQuanTri,nvkTaiKhoan,' . $id,
            'nvkMatKhau' => 'nullable|string',
            'nvkTrangThai' => 'required|boolean',
        ]);

        $nvkQuanTri = NvkQuanTri::findOrFail($id);

        if ($request->filled('nvkMatKhau')) {
            $nvkQuanTri->nvkMatKhau = bcrypt($request->nvkMatKhau); // Mã hóa mật khẩu nếu có thay đổi
        }

        $nvkQuanTri->nvkTaiKhoan = $request->nvkTaiKhoan;
        $nvkQuanTri->nvkTrangThai = $request->nvkTrangThai;

        $nvkQuanTri->save();

        return redirect()->route('nvkquantri.index');
    }

    // Xóa quản trị
    public function destroy($id)
    {
        NvkQuanTri::destroy($id);
        return redirect()->route('nvkquantri.index');
    }
}