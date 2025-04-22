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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id_booking');
            $table->bigInteger('id_patient')->unsigned();
            $table->bigInteger('id_doctor')->unsigned();
            $table->foreign('id_patient')->references('id_patient')->on('patients')->onDelete('cascade');
            $table->foreign('id_doctor')->references('id_doctor')->on('doctors')->onDelete('cascade');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
