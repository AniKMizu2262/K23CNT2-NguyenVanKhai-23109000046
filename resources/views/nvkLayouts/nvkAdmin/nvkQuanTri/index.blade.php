@extends('nvkLayouts.Admins.Master')

@section('title', 'Danh sách quản trị')

@section('content-body')
    <h1>Danh sách quản trị</h1>
    <a href="{{ route('nvkquantri.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tài khoản</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nvkQuanTri as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nvkTaiKhoan }}</td>
                    <td>{{ $item->nvkTrangThai ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                    <td>
                        <a href="{{ route('nvkquantri.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('nvkquantri.destroy', $item->id) }}" method="POST" style="display:inline;">
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