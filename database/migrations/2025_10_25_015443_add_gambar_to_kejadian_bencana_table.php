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
        Schema::table('kejadian_bencana', function (Blueprint $table) {
        // Ini akan menambah kolom 'gambar' setelah 'deskripsi'
        $table->string('gambar')->nullable()->after('deskripsi'); 
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('kejadian_bencana', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migrasi di-rollback
            $table->dropColumn('gambar');
        });
    }
};
