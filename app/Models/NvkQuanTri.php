<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvkQuanTri extends Model
{
    // Chỉ định tên bảng
    protected $table = 'nvkQuanTri';

    // Khai báo các cột có thể điền giá trị
    protected $fillable = ['nvkTaiKhoan', 'nvkMatKhau', 'nvkTrangThai'];
}