<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nvkKhachHang', function (Blueprint $table) {
            $table->id();
            $table->string('nvkMaKhachHang')->unique();
            $table->string('nvkTenKhachHang');
            $table->string('nvkDiaChi');
            $table->string('nvkSoDienThoai');
            $table->string('nvkEmail');
            $table->boolean('nvkGioiTinh');
            $table->date('nvkNgaySinh');
            $table->string('nvkMatKhau');
            $table->boolean('nvkTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvkKhachHang');
    }
};
