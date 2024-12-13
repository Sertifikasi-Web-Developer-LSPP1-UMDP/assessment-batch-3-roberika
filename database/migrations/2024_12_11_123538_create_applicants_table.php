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
            $table->string('name');
            $table->string('gender');   
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('religion');
            $table->string('citizenship');
            $table->string('address');
            $table->string('phone_number');
            $table->string('guardian_phone_number');

            $table->string('school');
            $table->string('school_path');
            $table->string('major');
            $table->longText('reason');

            $table->unsignedBigInteger('status_id')->default(1);
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
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropForeign(['id']);
        });
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
        });
        Schema::dropIfExists('applicants');
    }
};
