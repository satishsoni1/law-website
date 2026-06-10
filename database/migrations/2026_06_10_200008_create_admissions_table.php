<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->string('student_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->enum('category', ['general', 'obc', 'sc', 'st', 'nt', 'sbc'])->default('general');
            $table->string('qualification');
            $table->string('board_university')->nullable();
            $table->string('passing_year')->nullable();
            $table->decimal('percentage', 5, 2)->nullable();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('document_10th')->nullable();
            $table->string('document_12th')->nullable();
            $table->string('document_graduation')->nullable();
            $table->string('document_tc')->nullable();
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected'])->default('pending');
            $table->text('remarks')->nullable();
            $table->string('academic_year')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
