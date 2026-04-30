<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            // Kolom detail untuk menyimpan ringkasan teks pesanan (Contoh: "Dimsum Mentai x2")
            // Ini yang akan dipanggil di halaman Riwayat Transaksi agar terlihat ringkas
            $table->text('detail')->nullable(); 
            
            $table->integer('total');      // Sesuai 'Total Tagihan' di tampilan kamu
            $table->integer('bayar');      // Sesuai input nominal uang yang dimasukkan
            $table->integer('kembalian');  // Sesuai field 'KEMBALI' di tampilan kamu
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('transaksis');
    }
};