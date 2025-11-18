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
          Schema::create('posko_bencana', function (Blueprint $table) {
        $table->id('posko_id');
        $table->string('nama_posko');
        $table->string('alamat');
        $table->string('kontak');
        $table->string('penanggung_jawab');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posko_bencana');
    }
};
