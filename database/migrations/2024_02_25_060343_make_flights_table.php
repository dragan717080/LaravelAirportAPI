<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('departure_time');
            $table->string('arrival_time');

            $table->timestamps();

            $table->foreignUuid('airline_id')->references('id')->on('airlines');
            $table->foreignUuid('departure_airport_id')->references('id')->on('airports');
            $table->foreignUuid('arrival_airport_id')->references('id')->on('airports');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
