<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvkCTHD extends Model
{
    protected $table = 'nvkCTHD';

    protected $fillable = [
        'nvkMaHoaDon',
        'nvkMaSanPham',
        'nvkSoLuong',
        'nvkDonGia',
        'nvkThanhTien',
        'nvkTrangThai'
    ];

    public function hoaDon()
    {
        return $this->belongsTo(NvkHoaDon::class, 'nvkMaHoaDon', 'nvkMaHoaDon');
    }

    public function sanPham()
    {
        return $this->belongsTo(NvkSanPham::class, 'nvkMaSanPham', 'nvkMaSanPham');
    }
}