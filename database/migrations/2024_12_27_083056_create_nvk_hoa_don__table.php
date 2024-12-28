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
        Schema::create('nvkHoaDon', function (Blueprint $table) {
            $table->id();
            $table->string('nvkMaHoaDon')->unique();
            $table->string('nvkMaKhachHang');
            $table->date('nvkNgayLap');
            $table->decimal('nvkTongTien', 10, 2);
            $table->boolean('nvkTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvkHoaDon');
    }
};
