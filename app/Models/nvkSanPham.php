<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvkSanPham extends Model
{
    protected $table = 'nvkSanPham';

    protected $fillable = [
        'nvkMaSanPham', 
        'nvkTenSanPham', 
        'nvkHinhAnh', 
        'nvkSoLuong', 
        'nvkDonGia', 
        'nvkMaLoai', 
        'nvkTrangThai'
    ];

    public function loaiSanPham()
    {
        return $this->belongsTo(NvkLoaiSanPham::class, 'nvkMaLoai', 'nvkMaLoai');
    }
}