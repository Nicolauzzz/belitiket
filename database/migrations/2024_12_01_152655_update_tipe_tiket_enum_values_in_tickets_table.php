<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE tickets MODIFY COLUMN tipe_tiket ENUM('FESTIVAL', 'VIP', 'PREMIUM', 'PAKET NGE-DATE FESTIVAL')");

        // If you prefer using Schema to modify the enum column, you can do so as well
        // but DB::statement is the most reliable option when changing enum values.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to the original enum values
        DB::statement("ALTER TABLE tickets MODIFY COLUMN tipe_tiket ENUM('FESTIVAL', 'VIP')");

        // Or if needed, you can drop the column and recreate it.
        // Schema::table('tickets', function (Blueprint $table) {s
        //     $table->enum('tipe_tiket', ['FESTIVAL', 'VIP']);
        // });
    }
};
