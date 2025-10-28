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
       Schema::create('wargas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('nik')->unique(); // NIK biasanya unik
        $table->text('alamat');
        $table->string('no_telepon')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        // Tambahkan kolom lain jika perlu (tgl_lahir, dll)
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
