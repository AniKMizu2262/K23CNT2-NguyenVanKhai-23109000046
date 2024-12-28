@extends('nvkLayouts.Admins.Master')

@section('title', 'Danh sách sản phẩm')

@section('content-body')
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('nvkSanPham.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Loại</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nvkSanPham as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nvkMaSanPham }}</td>
                    <td>{{ $item->nvkTenSanPham }}</td>
                    <td>{{ $item->nvkSoLuong }}</td>
                    <td>{{ $item->nvkDonGia }}</td>
                    <td>{{ $item->loaiSanPham ? $item->loaiSanPham->nvkTenLoai : 'Không xác định' }}</td>
                    <td>
                        @if ($item->nvkHinhAnh)
                            <img src="{{ asset('images/' . $item->nvkHinhAnh) }}" alt="{{ $item->nvkTenSanPham }}" width="100">
                        @else
                            Không có ảnh
                        @endif
                    </td>
                    <td>{{ $item->nvkTrangThai ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                    <td>
                        <a href="{{ route('nvkSanPham.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('nvkSanPham.destroy', $item->id) }}" method="POST" style="display:inline;">
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