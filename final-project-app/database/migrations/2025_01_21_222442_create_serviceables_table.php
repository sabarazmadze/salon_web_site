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
        Schema::create('serviceables', function (Blueprint $table) {
            $table->id(); // or $table->bigIncrements('id');
            $table->unsignedBigInteger('serviceable_id');
            $table->string('serviceable_type');
            $table->unsignedBigInteger('services_service_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serviceables');
    }
};
