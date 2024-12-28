@extends('nvkLayouts.Admins.Master')

@section('title', 'Sửa loại sản phẩm')

@section('content-body')
    <h1>Sửa loại sản phẩm</h1>
    <form action="{{ route('nvkLoaiSanPham.update', $nvkLoaiSanPham->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nvkMaLoai" class="form-label">Mã loại</label>
            <input type="text" class="form-control" id="nvkMaLoai" name="nvkMaLoai" value="{{ $nvkLoaiSanPham->nvkMaLoai }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkTenLoai" class="form-label">Tên loại</label>
            <input type="text" class="form-control" id="nvkTenLoai" name="nvkTenLoai" value="{{ $nvkLoaiSanPham->nvkTenLoai }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1" {{ $nvkLoaiSanPham->nvkTrangThai == 1 ? 'selected' : '' }}>Kích hoạt</option>
                <option value="0" {{ $nvkLoaiSanPham->nvkTrangThai == 0 ? 'selected' : '' }}>Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('nvkLoaiSanPham.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection