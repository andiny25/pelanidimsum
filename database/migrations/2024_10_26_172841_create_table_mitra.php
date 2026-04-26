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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id('mitra_id'); // menggunakan id yang berfungsi sebagai primary key
            $table->string('nama_mitra', 200); // nama mitra
            $table->text('alamat')->nullable(); // alamat, opsional
            $table->string('email', 50)->unique(); // email, harus unik
            $table->string('nomor_telepon'); // nomor telepon
            $table->enum('jenis_kemitraan', ['Platinum', 'Gold', 'Silver']); // jenis kemitraan
            $table->date('tanggal_bergabung'); // tanggal bergabung
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
