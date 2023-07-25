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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('street', 100);
            $table->string('city', 100);
            $table->string('state', 50);
            $table->string('postal_code', 50);
            $table->string('latitude', 100)->nullable();
            $table->string('Longitude', 100)->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
        Schema::table("venues", function ($table) {
            $table->dropSoftDeletes();
        });
    }
};
