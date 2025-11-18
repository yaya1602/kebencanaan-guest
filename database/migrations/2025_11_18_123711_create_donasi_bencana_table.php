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
        Schema::create('donasi_bencana', function (Blueprint $table) {
        $table->id('donasi_id');
        $table->unsignedBigInteger('posko_id'); // FK ke posko
        $table->string('donatur_nama');
        $table->string('jenis_donasi');
        $table->decimal('nilai', 12, 2);
        $table->timestamps();

        $table->foreign('posko_id')
              ->references('posko_id')
              ->on('posko_bencana')
              ->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi_bencana');
    }
};
