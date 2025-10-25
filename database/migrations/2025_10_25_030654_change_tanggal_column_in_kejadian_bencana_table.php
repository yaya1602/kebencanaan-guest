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
            
            // Perintah ini akan mengubah tipe kolom 'tanggal'
            // dari TIMESTAMP (yang salah) menjadi DATE (yang benar).
            $table->date('tanggal')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('kejadian_bencana', function (Blueprint $table) {
            // Perintah rollback (jika diperlukan)
            $table->timestamp('tanggal')->nullable()->change();
        });
    }
};
