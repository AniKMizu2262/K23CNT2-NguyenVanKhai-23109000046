@extends('nvkLayouts.Admins.Master')

@section('title', 'Thêm mới khách hàng')

@section('content-body')
    <h1>Thêm mới khách hàng</h1>
    <form action="{{ route('nvkKhachHang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nvkMaKhachHang" class="form-label">Mã khách hàng</label>
            <input type="text" class="form-control" id="nvkMaKhachHang" name="nvkMaKhachHang" required>
        </div>
        <div class="mb-3">
            <label for="nvkTenKhachHang" class="form-label">Tên khách hàng</label>
            <input type="text" class="form-control" id="nvkTenKhachHang" name="nvkTenKhachHang" required>
        </div>
        <div class="mb-3">
            <label for="nvkDiaChi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="nvkDiaChi" name="nvkDiaChi" required>
        </div>
        <div class="mb-3">
            <label for="nvkSoDienThoai" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="nvkSoDienThoai" name="nvkSoDienThoai" required>
        </div>
        <div class="mb-3">
            <label for="nvkEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="nvkEmail" name="nvkEmail" required>
        </div>
        <div class="mb-3">
            <label for="nvkGioiTinh" class="form-label">Giới tính</label>
            <select class="form-control" id="nvkGioiTinh" name="nvkGioiTinh" required>
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nvkNgaySinh" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="nvkNgaySinh" name="nvkNgaySinh" required>
        </div>
        <div class="mb-3">
            <label for="nvkMatKhau" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="nvkMatKhau" name="nvkMatKhau" required>
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1">Kích hoạt</option>
                <option value="0">Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('nvkKhachHang.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection