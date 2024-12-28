@extends('nvkLayouts.Admins.Master')

@section('title', 'Thêm mới hóa đơn')

@section('content-body')
    <h1>Thêm mới hóa đơn</h1>
    <form action="{{ route('nvkHoaDon.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nvkMaHoaDon" class="form-label">Mã hóa đơn</label>
            <input type="text" class="form-control" id="nvkMaHoaDon" name="nvkMaHoaDon" required>
        </div>
        <div class="mb-3">
            <label for="nvkMaKhachHang" class="form-label">Khách hàng</label>
            <select class="form-control" id="nvkMaKhachHang" name="nvkMaKhachHang" required>
                @foreach ($nvkKhachHang as $khachHang)
                    <option value="{{ $khachHang->nvkMaKhachHang }}">{{ $khachHang->nvkTenKhachHang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nvkNgayLap" class="form-label">Ngày lập</label>
            <input type="date" class="form-control" id="nvkNgayLap" name="nvkNgayLap" required>
        </div>
        <div class="mb-3">
            <label for="nvkTongTien" class="form-label">Tổng tiền</label>
            <input type="number" step="0.01" class="form-control" id="nvkTongTien" name="nvkTongTien" required>
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1">Kích hoạt</option>
                <option value="0">Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('nvkHoaDon.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection