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
        Schema::create('nvkSanPham', function (Blueprint $table) {
            $table->id();
            $table->string('nvkMaSanPham')->unique();
            $table->string('nvkTenSanPham');
            $table->string('nvkHinhAnh')->nullable();
            $table->integer('nvkSoLuong');
            $table->decimal('nvkDonGia', 10, 2);
            $table->string('nvkMaLoai');
            $table->boolean('nvkTrangThai')->default(true);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('nvkMaLoai')->references('nvkMaLoai')->on('nvkLoaiSanPham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvkSanPham');
    }
};
