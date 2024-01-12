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
        Schema::create('referee_requests', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->date('birthdate');
            $table->string('contact_number', 20)->unique();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('postal_code', 10);
            $table->string('address', 250);
            $table->json('interests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referee_requests');
    }
};
