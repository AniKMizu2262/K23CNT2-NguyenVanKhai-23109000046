<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvkHoaDon extends Model
{
    protected $table = 'nvkHoaDon';

    protected $fillable = [
        'nvkMaHoaDon',
        'nvkMaKhachHang',
        'nvkNgayLap',
        'nvkTongTien',
        'nvkTrangThai'
    ];

    public function khachHang()
    {
        return $this->belongsTo(NvkKhachHang::class, 'nvkMaKhachHang', 'nvkMaKhachHang');
    }
}