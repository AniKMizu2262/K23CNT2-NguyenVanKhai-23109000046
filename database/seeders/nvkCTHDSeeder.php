<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nvkCTHDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('nvkCTHD')->insert([
            [
                'nvkMaHoaDon' => 'HD001',
                'nvkMaSanPham' => 'SP001',
                'nvkSoLuong' => 1,
                'nvkDonGia' => 100000,
                'nvkThanhTien' => 100000,
                'nvkTrangThai' => true,
            ],
            [
                'nvkMaHoaDon' => 'HD002',
                'nvkMaSanPham' => 'SP002',
                'nvkSoLuong' => 1,
                'nvkDonGia' => 100000,
                'nvkThanhTien' => 100000,
                'nvkTrangThai' => true,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
