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
                            // Schema::create('detail_transaksis', function (Blueprint $table) {
                            //     $table->id();
                            //     $table->foreignId('transaksi_id')->constrained()->onDelete('cascade');
                            //     $table->foreignId('produk_id');
                            //     $table->integer('qty');
                            //     $table->integer('harga');
                            //     $table->timestamps();
                            // });
}

    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
