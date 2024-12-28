@extends('nvkLayouts.Admins.Master')

@section('title', 'Danh sách chi tiết hóa đơn')

@section('content-body')
    <h1>Danh sách chi tiết hóa đơn</h1>
    <a href="{{ route('nvkCTHD.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã hóa đơn</th>
                <th>Mã sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nvkCTHD as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->hoaDon ? $item->hoaDon->nvkMaHoaDon : 'Không xác định' }}</td>
                    <td>{{ $item->sanPham ? $item->sanPham->nvkMaSanPham : 'Không xác định' }}</td>
                    <td>{{ $item->nvkSoLuong }}</td>
                    <td>{{ $item->nvkDonGia }}</td>
                    <td>{{ $item->nvkThanhTien }}</td>
                    <td>{{ $item->nvkTrangThai ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                    <td>
                        <a href="{{ route('nvkCTHD.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('nvkCTHD.destroy', $item->id) }}" method="POST" style="display:inline;">
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