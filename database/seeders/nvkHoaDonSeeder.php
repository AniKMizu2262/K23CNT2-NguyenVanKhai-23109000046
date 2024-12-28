<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nvkHoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('nvkHoaDon')->insert([
            [
                'nvkMaHoaDon' => 'HD001',
                'nvkMaKhachHang' => 'KH001',
                'nvkNgayLap' => '2021-07-10',
                'nvkTongTien' => 100000,
                'nvkTrangThai' => true,
            ],
            [
                'nvkMaHoaDon' => 'HD002',
                'nvkMaKhachHang' => 'KH001',
                'nvkNgayLap' => '2021-07-10',
                'nvkTongTien' => 100000,
                'nvkTrangThai' => true,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
