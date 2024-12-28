@extends('nvkLayouts.Admins.Master')

@section('title', 'Thêm mới loại sản phẩm')

@section('content-body')
    <h1>Thêm mới loại sản phẩm</h1>
    <form action="{{ route('nvkLoaiSanPham.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nvkMaLoai" class="form-label">Mã loại</label>
            <input type="text" class="form-control" id="nvkMaLoai" name="nvkMaLoai" required>
        </div>
        <div class="mb-3">
            <label for="nvkTenLoai" class="form-label">Tên loại</label>
            <input type="text" class="form-control" id="nvkTenLoai" name="nvkTenLoai" required>
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1">Kích hoạt</option>
                <option value="0">Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('nvkLoaiSanPham.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection