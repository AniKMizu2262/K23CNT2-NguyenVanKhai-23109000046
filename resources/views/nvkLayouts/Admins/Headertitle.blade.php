<div class="d-flex justify-content-between align-items-center">
    <h1>Quản lý</h1>
    <div class="d-flex align-items-center">
        <span class="me-3">Xin chào, Admin</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">Đăng xuất</button>
        </form>
    </div>
</div>