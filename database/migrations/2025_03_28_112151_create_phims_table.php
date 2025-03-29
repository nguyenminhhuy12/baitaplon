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
        Schema::create('phims', function (Blueprint $table) {
            $table->bigIncrements('MaPhim'); // Sửa id thành bigIncrements
            $table->string('TenPhim');
            $table->string('path');
            $table->float('ThoiLuong');
            $table->dateTime('NgayCongChieu');
            $table->string('TrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phims');
    }
};
