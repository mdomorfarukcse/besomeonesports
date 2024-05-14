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
        Schema::create('league_player', function (Blueprint $table) {
            $table->foreignId('league_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->foreignId('player_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->unique(['league_id', 'player_id'], 'league_player_unique');
            
            $table->foreignId('paid_by')
                  ->constrained('users');

            $table->float('total_paid');

            $table->string('transaction_id')->unique();
            $table->string('invoice_number')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('league_player');
    }
};
