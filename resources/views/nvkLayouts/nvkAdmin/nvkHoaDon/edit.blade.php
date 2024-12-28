@extends('nvkLayouts.Admins.Master')

@section('title', 'Sửa hóa đơn')

@section('content-body')
    <h1>Sửa hóa đơn</h1>
    <form action="{{ route('nvkHoaDon.update', $nvkHoaDon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nvkMaHoaDon" class="form-label">Mã hóa đơn</label>
            <input type="text" class="form-control" id="nvkMaHoaDon" name="nvkMaHoaDon" value="{{ $nvkHoaDon->nvkMaHoaDon }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkMaKhachHang" class="form-label">Khách hàng</label>
            <select class="form-control" id="nvkMaKhachHang" name="nvkMaKhachHang" required>
                @foreach ($nvkKhachHang as $khachHang)
                    <option value="{{ $khachHang->nvkMaKhachHang }}" {{ $nvkHoaDon->nvkMaKhachHang == $khachHang->nvkMaKhachHang ? 'selected' : '' }}>{{ $khachHang->nvkTenKhachHang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nvkNgayLap" class="form-label">Ngày lập</label>
            <input type="date" class="form-control" id="nvkNgayLap" name="nvkNgayLap" value="{{ $nvkHoaDon->nvkNgayLap }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkTongTien" class="form-label">Tổng tiền</label>
            <input type="number" step="0.01" class="form-control" id="nvkTongTien" name="nvkTongTien" value="{{ $nvkHoaDon->nvkTongTien }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1" {{ $nvkHoaDon->nvkTrangThai == 1 ? 'selected' : '' }}>Kích hoạt</option>
                <option value="0" {{ $nvkHoaDon->nvkTrangThai == 0 ? 'selected' : '' }}>Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('nvkHoaDon.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection