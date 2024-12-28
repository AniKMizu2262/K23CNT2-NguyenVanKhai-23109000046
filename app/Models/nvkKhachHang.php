<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvkKhachHang extends Model
{
    protected $table = 'nvkKhachHang';

    protected $fillable = [
        'nvkMaKhachHang', 
        'nvkTenKhachHang', 
        'nvkDiaChi', 
        'nvkSoDienThoai', 
        'nvkEmail', 
        'nvkGioiTinh', 
        'nvkNgaySinh', 
        'nvkMatKhau', 
        'nvkTrangThai'
    ];

    // Mutator to hash password before saving
    public function setNvkMatKhauAttribute($value)
    {
        $this->attributes['nvkMatKhau'] = bcrypt($value);
    }
}