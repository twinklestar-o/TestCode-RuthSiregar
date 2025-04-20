<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa_ekstrakulikuler', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('ekstrakulikuler_id')->constrained()->onDelete('cascade');
            $table->year('tahun'); // Tahun keikutsertaan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa_ekstrakulikuler');
    }
};