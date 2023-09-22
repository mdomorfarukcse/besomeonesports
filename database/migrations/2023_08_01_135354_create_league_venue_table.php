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
        Schema::create('league_venue', function (Blueprint $table) {
            $table->foreignId('league_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreignId('venue_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            
            $table->primary(['league_id', 'venue_id'], 'league_venue_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('league_venue');
    }
};
