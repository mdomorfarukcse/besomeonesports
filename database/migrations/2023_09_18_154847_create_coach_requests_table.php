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
        Schema::create('coach_requests', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->date('birthdate');
            $table->string('phone_number', 20)->unique();
            $table->string('street_address', 100);
            $table->string('extended_address', 100)->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('postal_code', 10);
            $table->json('sport_of_interests');
            $table->json('grade_of_interests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coach_requests');
    }
};
