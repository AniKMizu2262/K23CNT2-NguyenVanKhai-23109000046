<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nvkSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('nvkSanPham')->truncate();
        DB::table('nvkSanPham')->insert([
            [
                'nvkMaSanPham' => 'SP001',
                'nvkTenSanPham' => 'Asus Rog',
                'nvkHinhAnh' => 'img/Asus.webp',
                'nvkSoLuong' => 100,
                'nvkDonGia' => 100000,
                'nvkMaLoai' => 'LSP001',
                'nvkTrangThai' => true,
            ],
            [
                'nvkMaSanPham' => 'SP002',
                'nvkTenSanPham' => 'Xiaomi 14',
                'nvkHinhAnh' => 'img/Xiaomi14.webp',
                'nvkSoLuong' => 100,
                'nvkDonGia' => 100000,
                'nvkMaLoai' => 'LSP001',
                'nvkTrangThai' => true,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        
    }
}