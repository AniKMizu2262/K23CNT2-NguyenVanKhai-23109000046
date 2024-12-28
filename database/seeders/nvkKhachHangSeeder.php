<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nvkKhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('nvkKhachHang')->insert([
            'nvkMaKhachHang' => 'KH001',
            'nvkTenKhachHang' => 'Nguyễn Văn Khải',
            'nvkDiaChi' => 'Hà Nội',
            'nvkSoDienThoai' => '098763214',
            'nvkEmail' => 'nguyenvankhai2262@gmail.com',
            'nvkGioiTinh' => true,
            'nvkNgaySinh' => '2005-07-10',
            'nvkMatKhau' => 'AniKMizu@2262',
            'nvkTrangThai' => true,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                
    }
}
