@extends('nvkLayouts.Admins.Master')

@section('title', 'Sửa khách hàng')

@section('content-body')
    <h1>Sửa khách hàng</h1>
    <form action="{{ route('nvkKhachHang.update', $nvkKhachHang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nvkMaKhachHang" class="form-label">Mã khách hàng</label>
            <input type="text" class="form-control" id="nvkMaKhachHang" name="nvkMaKhachHang" value="{{ $nvkKhachHang->nvkMaKhachHang }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkTenKhachHang" class="form-label">Tên khách hàng</label>
            <input type="text" class="form-control" id="nvkTenKhachHang" name="nvkTenKhachHang" value="{{ $nvkKhachHang->nvkTenKhachHang }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkDiaChi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="nvkDiaChi" name="nvkDiaChi" value="{{ $nvkKhachHang->nvkDiaChi }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkSoDienThoai" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="nvkSoDienThoai" name="nvkSoDienThoai" value="{{ $nvkKhachHang->nvkSoDienThoai }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="nvkEmail" name="nvkEmail" value="{{ $nvkKhachHang->nvkEmail }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkGioiTinh" class="form-label">Giới tính</label>
            <select class="form-control" id="nvkGioiTinh" name="nvkGioiTinh" required>
                <option value="1" {{ $nvkKhachHang->nvkGioiTinh == 1 ? 'selected' : '' }}>Nam</option>
                <option value="0" {{ $nvkKhachHang->nvkGioiTinh == 0 ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nvkNgaySinh" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="nvkNgaySinh" name="nvkNgaySinh" value="{{ $nvkKhachHang->nvkNgaySinh }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkMatKhau" class="form-label">Mật khẩu (để trống nếu không thay đổi)</label>
            <input type="password" class="form-control" id="nvkMatKhau" name="nvkMatKhau">
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1" {{ $nvkKhachHang->nvkTrangThai == 1 ? 'selected' : '' }}>Kích hoạt</option>
                <option value="0" {{ $nvkKhachHang->nvkTrangThai == 0 ? 'selected' : '' }}>Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('nvkKhachHang.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection