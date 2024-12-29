<?php
// app/Models/NvkQuanTri.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class NvkQuanTri extends Authenticatable
{
    protected $table = 'nvkQuanTri';

    protected $fillable = [
        'nvkTaiKhoan',
        'nvkMatKhau',
        'nvkTrangThai',
    ];

    protected $hidden = [
        'nvkMatKhau',
    ];

    public function getAuthPassword()
    {
        return $this->nvkMatKhau;
    }
}