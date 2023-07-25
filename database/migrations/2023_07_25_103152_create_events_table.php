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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('season_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            
            $table->foreignId('sport_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name', 100)->unique();
            $table->date('start');
            $table->date('end');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('events');
        Schema::table("events", function ($table) {
            $table->dropSoftDeletes();
        });
    }
};
