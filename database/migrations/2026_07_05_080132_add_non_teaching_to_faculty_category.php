<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE faculty MODIFY COLUMN category ENUM('permanent', 'visiting', 'non_teaching') DEFAULT 'permanent'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE faculty MODIFY COLUMN category ENUM('permanent', 'visiting') DEFAULT 'permanent'");
    }
};
