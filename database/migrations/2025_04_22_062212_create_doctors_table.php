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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('id_doctor');
            $table->string('name');
            $table->bigInteger('specialization_id')->unsigned();
            $table->foreign('specialization_id')->references('id_specialization')->on('specializations')->onDelete('cascade');
            $table->json('available_days')->nullable();
            $table->time('available_time_start');
            $table->time('available_time_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
