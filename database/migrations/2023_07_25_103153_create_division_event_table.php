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
        Schema::create('division_event', function (Blueprint $table) {
            $table->foreignId('division_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreignId('event_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            
            $table->primary(['division_id', 'event_id'], 'division_event_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('division_event');
    }
};