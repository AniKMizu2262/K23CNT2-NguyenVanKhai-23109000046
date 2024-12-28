@extends('nvkLayouts.Admins.Master')

@section('title', 'Danh sách khách hàng')

@section('content-body')
    <h1>Danh sách khách hàng</h1>
    <a href="{{ route('nvkKhachHang.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nvkKhachHang as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nvkMaKhachHang }}</td>
                    <td>{{ $item->nvkTenKhachHang }}</td>
                    <td>{{ $item->nvkDiaChi }}</td>
                    <td>{{ $item->nvkSoDienThoai }}</td>
                    <td>{{ $item->nvkEmail }}</td>
                    <td>{{ $item->nvkGioiTinh ? 'Nam' : 'Nữ' }}</td>
                    <td>{{ $item->nvkNgaySinh }}</td>
                    <td>{{ $item->nvkTrangThai ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                    <td>
                        <a href="{{ route('nvkKhachHang.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('nvkKhachHang.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection