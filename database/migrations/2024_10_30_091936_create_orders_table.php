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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');    // Relasi ke tabel users
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');// relasi ke tabel tiket
            $table->integer('quantity');
            $table->decimal('harga', 10, 2);                                            // Harga tiket pada saat transaksi
            $table->timestamp('waktu_pembelian')->useCurrent();                                     // Timestamp untuk waktu pembelian
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
