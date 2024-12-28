@extends('nvkLayouts.Admins.Master')

@section('title', 'Sửa sản phẩm')

@section('content-body')
    <h1>Sửa sản phẩm</h1>
    <form action="{{ route('nvkSanPham.update', $nvkSanPham->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nvkMaSanPham" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control" id="nvkMaSanPham" name="nvkMaSanPham" value="{{ $nvkSanPham->nvkMaSanPham }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkTenSanPham" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="nvkTenSanPham" name="nvkTenSanPham" value="{{ $nvkSanPham->nvkTenSanPham }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkHinhAnh" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="nvkHinhAnh" name="nvkHinhAnh">
            @if ($nvkSanPham->nvkHinhAnh)
                <img src="{{ asset('images/' . $nvkSanPham->nvkHinhAnh) }}" alt="{{ $nvkSanPham->nvkTenSanPham }}" width="100">
            @endif
        </div>
        <div class="mb-3">
            <label for="nvkSoLuong" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="nvkSoLuong" name="nvkSoLuong" value="{{ $nvkSanPham->nvkSoLuong }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkDonGia" class="form-label">Đơn giá</label>
            <input type="number" step="0.01" class="form-control" id="nvkDonGia" name="nvkDonGia" value="{{ $nvkSanPham->nvkDonGia }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkMaLoai" class="form-label">Loại sản phẩm</label>
            <select class="form-control" id="nvkMaLoai" name="nvkMaLoai" required>
                @foreach ($nvkLoaiSanPham as $loai)
                    <option value="{{ $loai->nvkMaLoai }}" {{ $nvkSanPham->nvkMaLoai == $loai->nvkMaLoai ? 'selected' : '' }}>{{ $loai->nvkTenLoai }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1" {{ $nvkSanPham->nvkTrangThai == 1 ? 'selected' : '' }}>Kích hoạt</option>
                <option value="0" {{ $nvkSanPham->nvkTrangThai == 0 ? 'selected' : '' }}>Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('nvkSanPham.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection