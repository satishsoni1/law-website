<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->where('key', 'email')->update(['value' => 'ktspmslawcollege2024@gmail.com']);
    }

    public function down(): void
    {
        DB::table('settings')->where('key', 'email')->update(['value' => 'info@ktspmlawcollege.edu.in']);
    }
};
