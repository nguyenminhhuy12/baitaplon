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
        Schema::create('ves', function (Blueprint $table) {
            $table->bigIncrements('MaVe');
            $table->string('MaHoaDon')->nullable();
            $table->unsignedBigInteger('MaLichChieu'); // Định nghĩa khóa ngoại đúng kiểu
            $table->foreign('MaLichChieu')->references('MaLichChieu')->on('lich_chieus')->onDelete('cascade');
            $table->string('MaGhe');
            $table->string('TrangThai');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ves');
    }
};
