@extends('nvkLayouts.Admins.Master')

@section('title', 'Sửa quản trị')

@section('content-body')
    <h1>Sửa quản trị</h1>
    <form action="{{ route('nvkquantri.update', $nvkQuanTri->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nvkTaiKhoan" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" id="nvkTaiKhoan" name="nvkTaiKhoan" value="{{ $nvkQuanTri->nvkTaiKhoan }}" required>
        </div>
        <div class="mb-3">
            <label for="nvkMatKhau" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="nvkMatKhau" name="nvkMatKhau">
        </div>
        <div class="mb-3">
            <label for="nvkTrangThai" class="form-label">Trạng thái</label>
            <select class="form-control" id="nvkTrangThai" name="nvkTrangThai" required>
                <option value="1" {{ $nvkQuanTri->nvkTrangThai == 1 ? 'selected' : '' }}>Kích hoạt</option>
                <option value="0" {{ $nvkQuanTri->nvkTrangThai == 0 ? 'selected' : '' }}>Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('nvkquantri.index') }}" class="btn btn-secondary">Quay lại</a> <!-- Nút Quay lại -->
    </form>
@endsection