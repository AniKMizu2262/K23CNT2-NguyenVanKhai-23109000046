@extends('nvkLayouts.Admins.Master')

@section('title', 'Thêm mới chi tiết hóa đơn')

@section('content-body')
<h1>Thêm mới chi tiết hóa đơn</h1>
<form action="{{ route('nvkCTHD.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nvkMaHoaDon" class="form-label">Mã hóa đơn</label>
        <select class="form-control" id="nvkMaHoaDon" name="nvkMaHoaDon" required>
            @foreach ($nvkHoaDon as $hoaDon)
                <option value="{{ $hoaDon->nvkMaHoaDon }}">{{ $hoaDon->nvkMaHoaDon }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="nvkMaSanPham" class="form-label">Mã sản phẩm</label>
        <select class="form-control" id="nvkMaSanPham" name="nvkMaSanPham" required>
            @foreach ($nvkSanPham as $sanPham)
                <option value="{{ $sanPham->nvkMaSanPham }}">{{ $sanPham->nvkMaSanPham }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="nvkSoLuong" class="form-label">Số lượng</label>
        <input type="number" class="form-control" id="nvkSoLuong" name="nvkSoLuong" required>
    </div>
    <div class="mb-3">
        <label for="nvkDonGia" class="form-label">Đơn giá</label>
        <input type="number" step="0.01" class="form-control" id="nvkDonGia" name="nvkDonGia" required>
    </div>
    <div class="mb-3">
        <label for="nvkThanhTien" class="form-label">Thành tiền</label>
        <input type="number" step="0.01" class="form-control" id="nvkThanhTien" name="nvkThanhTien" required>
    </div>
    <div class="mb-3">
        <label for="nvkTrangThai" class="form-label">Trạng thái</label>
        <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
            <option value="1">Kích hoạt</option>
            <option value="0">Không kích hoạt</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('nvkCTHD.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection