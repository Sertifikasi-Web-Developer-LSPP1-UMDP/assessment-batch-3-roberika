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
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        Schema::create('applicant_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        Schema::create('announcement_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_statuses');
        Schema::dropIfExists('applicant_statuses');
        Schema::dropIfExists('announcement_statuses');
    }
};