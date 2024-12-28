@extends('nvkLayouts.Admins.Master')

@section('title', 'Danh sách loại sản phẩm')

@section('content-body')
    <h1>Danh sách loại sản phẩm</h1>
    <a href="{{ route('nvkLoaiSanPham.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nvkLoaiSanPham as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nvkMaLoai }}</td>
                    <td>{{ $item->nvkTenLoai }}</td>
                    <td>{{ $item->nvkTrangThai ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                    <td>
                        <a href="{{ route('nvkLoaiSanPham.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('nvkLoaiSanPham.destroy', $item->id) }}" method="POST" style="display:inline;">
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