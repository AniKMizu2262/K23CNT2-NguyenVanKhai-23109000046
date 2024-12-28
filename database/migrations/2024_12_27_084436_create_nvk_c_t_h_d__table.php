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
        Schema::create('nvkCTHD', function (Blueprint $table) {
            $table->id();
            $table->string('nvkMaHoaDon');
            $table->string('nvkMaSanPham');
            $table->integer('nvkSoLuong');
            $table->decimal('nvkDonGia', 10, 2);
            $table->decimal('nvkThanhTien', 10, 2);
            $table->boolean('nvkTrangThai');
            $table->foreign('nvkMaHoaDon')->references('nvkMaHoaDon')->on('nvkHoaDon')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvkCTHD');
    }
};
