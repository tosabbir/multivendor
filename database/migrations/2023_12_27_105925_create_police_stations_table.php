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
        Schema::create('police_stations', function (Blueprint $table) {
            $table->id('police_station_id');
            $table->foreignId('district_id');
            $table->foreign('district_id')->references('district_id')->on('districts')->onDelete('cascade');
            $table->string('police_station_name');
            $table->string('bn_police_station_name');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('police_stations');
    }
};
