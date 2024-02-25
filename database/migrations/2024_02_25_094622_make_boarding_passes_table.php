<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boarding_passes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('seat_number');
            $table->integer('gate_number');
            $table->string('boarding_time');

            $table->timestamps();

            $table->foreignUuid('passenger_id')->references('id')->on('passengers');
            $table->foreignUuid('flight_id')->references('id')->on('flights');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boarding_passes');
    }
};
