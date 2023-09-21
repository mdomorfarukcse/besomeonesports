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
        Schema::create('division_league', function (Blueprint $table) {
            $table->foreignId('division_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreignId('league_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            
            $table->primary(['division_id', 'league_id'], 'division_league_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('division_league');
    }
};
