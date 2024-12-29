<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NvkQuanTri;

class NvkQuanTriSeeder extends Seeder
{
    public function run()
    {
        NvkQuanTri::create([
            'nvkTaiKhoan' => 'nguyenvankhai2262@gmail.com',
            'nvkMatKhau' => bcrypt('AniKMizu@2262'), // Sử dụng bcrypt để hash mật khẩu
            'nvkTrangThai' => 1, // Giả sử bạn có một cột trạng thái
        ]);
    }
}