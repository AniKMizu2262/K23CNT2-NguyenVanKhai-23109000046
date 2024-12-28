@extends('nvkLayouts.Admins.Master')

@section('title', 'Thêm mới quản trị')

@section('content-body')
    <h1>Thêm mới quản trị</h1>
    <form action="{{ route('nvkquantri.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nvkTaiKhoan" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" id="nvkTaiKhoan" name="nvkTaiKhoan" required>
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
        <a href="{{ route('nvkquantri.index') }}" class="btn btn-secondary">Quay lại</a> <!-- Nút Quay lại -->
    </form>
@endsection