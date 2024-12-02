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
        Schema::create('ticket_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Relasi ke tabel events
            $table->string('kelas_tiket'); // Kelas tiket, misal: Festival, VIP
            $table->integer('harga'); //
            $table->integer('kuota'); //
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_options');
    }

};
