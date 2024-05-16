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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_id')->nullable(false);
            $table->unsignedBigInteger('patient_id')->nullable(false);
            $table->integer('number')->nullable(false);
            $table->date('date')->nullable(false);
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('patient_id')->references('user_id')->on('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
