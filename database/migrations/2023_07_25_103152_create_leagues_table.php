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
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();

            $table->foreignId('season_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            
            $table->foreignId('sport_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('logo')->nullable();
            $table->string('name', 100);
            $table->double('registration_fee', 8, 2);
            $table->date('start');
            $table->date('end');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('leagues');
        Schema::table("leagues", function ($table) {
            $table->dropSoftDeletes();
        });
    }
};
