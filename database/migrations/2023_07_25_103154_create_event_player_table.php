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
        Schema::create('event_player', function (Blueprint $table) {
            $table->foreignId('event_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->foreignId('player_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->unique(['event_id', 'player_id'], 'event_player_unique');
            
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
        Schema::dropIfExists('event_player');
    }
};
