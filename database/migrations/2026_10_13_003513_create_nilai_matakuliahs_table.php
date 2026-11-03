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
        Schema::create('nilai_matakuliahs', function (Blueprint $table) {
            $table->id();
            // Tambahkan foreign key untuk Mahasiswa
            $table->unsignedBigInteger('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            
            // Tambahkan foreign key untuk Matakuliah (sesuaikan nama tabel mata kuliah Anda, misal: matakuliahs)
            $table->unsignedBigInteger('matakuliah_id');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliahs')->onDelete('cascade');
            
            $table->decimal('nilai', 5, 2)->nullable(); // contoh kolom nilai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_matakuliahs');
    }
};

