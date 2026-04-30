<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan migration untuk membuat tabel kasir.
     */
    public function up(): void {
        Schema::create('kasir', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kasir');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken(); // Penting jika ingin pakai fitur 'Remember Me' saat login
            $table->timestamps();
        });
    }

    /**
     * Batalkan migration (Hapus tabel).
     */
    public function down(): void {
        Schema::dropIfExists('kasir');
    }
};