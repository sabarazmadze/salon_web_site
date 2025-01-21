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
        Schema::table('stylist_availabilities', function (Blueprint $table) {
            $table->unsignedBigInteger('stylists_stylist_service_id')->nullable(); // Adjust the type as needed
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stylist_availabilities', function (Blueprint $table) {
            //
        });
    }
};
