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
        Schema::create('lich_chieus', function (Blueprint $table) {
            $table->bigIncrements('MaLichChieu');
            $table->dateTime('ThoiGian');
            $table->string('PhongChieu');
            $table->unsignedBigInteger('MaPhim'); // Định nghĩa khóa ngoại đúng kiểu
            $table->foreign('MaPhim')->references('MaPhim')->on('phims')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_chieus');
    }
};
