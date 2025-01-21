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
        Schema::create('stylist_services', function (Blueprint $table) {
            $table->id('stylist_service_id');
            $table->morphs('serviceable');
            $table->foreignId('stylist_id')->constrained('stylists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stylist_services');
    }
};
