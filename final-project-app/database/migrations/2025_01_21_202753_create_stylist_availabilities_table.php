<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stylist_availabilities', function (Blueprint $table) {
            $table->id('availability_id');
            $table->date('available_date');
            $table->time('available_start_time');
            $table->time('available_end_time');
            $table->timestamps();
            $table->foreignId('stylist_id')->references('id')->on('stylists')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stylist_availabilities');
    }
};
