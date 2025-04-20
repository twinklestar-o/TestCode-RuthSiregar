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
        Schema::create('ekstrakulikulers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ekstrakulikuler');
            $table->string('nama_penanggungjawab')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('status', ['aktif', 'non-aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakulikulers');
    }
};
