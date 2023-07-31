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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->year('year');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('seasons');
        Schema::table("seasons", function ($table) {
            $table->dropSoftDeletes();
        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->dropUnique('start_end_unique');
        });
    }
};
