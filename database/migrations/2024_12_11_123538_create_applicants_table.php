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
        Schema::create('applicants', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users', 'id')->primary();
            $table->string('student_number')->nullable();
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('religion')->nullable();
            $table->string('address')->nullable();
            $table->string('guardian_phone_number')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
                ->references('id')
                ->on('applicant_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
