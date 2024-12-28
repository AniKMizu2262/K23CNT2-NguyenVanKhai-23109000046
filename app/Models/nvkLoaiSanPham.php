<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvkLoaiSanPham extends Model
{
    protected $table = 'nvkLoaiSanPham';

    protected $fillable = ['nvkMaLoai', 'nvkTenLoai', 'nvkTrangThai'];
}