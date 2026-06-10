<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_name')->nullable();
            $table->text('description')->nullable();
            $table->string('duration');
            $table->integer('intake')->nullable();
            $table->string('fees')->nullable();
            $table->text('eligibility')->nullable();
            $table->string('medium')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('brochure')->nullable();
            $table->text('syllabus')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
