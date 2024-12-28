@extends('nvkLayouts.Admins.Master')

@section('title', 'Danh sách hóa đơn')

@section('content-body')
    <h1>Danh sách hóa đơn</h1>
    <a href="{{ route('nvkHoaDon.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã hóa đơn</th>
                <th>Khách hàng</th>
                <th>Ngày lập</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nvkHoaDon as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nvkMaHoaDon }}</td>
                    <td>{{ $item->khachHang ? $item->khachHang->nvkTenKhachHang : 'Không xác định' }}</td>
                    <td>{{ $item->nvkNgayLap }}</td>
                    <td>{{ $item->nvkTongTien }}</td>
                    <td>{{ $item->nvkTrangThai ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                    <td>
                        <a href="{{ route('nvkHoaDon.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('nvkHoaDon.destroy', $item->id) }}" method="POST" style="display:inline;">
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