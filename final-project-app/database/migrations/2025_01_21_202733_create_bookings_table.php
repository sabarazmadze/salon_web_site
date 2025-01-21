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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id'); 
            $table->morphs('bookable');
            $table->unsignedBigInteger('client_id'); 
            $table->date('booking_date'); 
            $table->time('booking_time'); 
            $table->text('notes')->nullable(); 
            $table->timestamps();
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['client_id']); 
        });

        Schema::dropIfExists('bookings'); 
    }

};
