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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->unique()
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            
            $table->foreignId('guardian_id')
                  ->nullable()
                  ->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('guardian_relation', 100)->nullable();

            $table->string('player_id')
                  ->unique();

            $table->foreignId('division_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('birthdate')->nullable();
            $table->string('contact_number', 20);
            $table->string('street_address', 100);
            $table->string('jersey', 100)->nullable();
            $table->string('extended_address', 100)->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('postal_code', 10);
            $table->string('position', 50)->nullable();
            $table->string('grade', 50)->default('N/A');
            $table->string('shirt_size', 50)->default('N/A');
            $table->string('short_size', 50)->default('N/A');
            $table->longText('note', 255)->nullable();

            // Parrent Info
            $table->string('guardian1_name', 100);
            $table->string('guardian1_email', 100)->nullable();
            $table->string('guardian1_contact', 20)->nullable();
            $table->string('guardian1_relationship', 100)->nullable();
            $table->string('guardian2_name', 100)->nullable();
            $table->string('guardian2_email', 100)->nullable();
            $table->string('guardian2_contact', 20)->nullable();
            $table->string('guardian2_relationship', 100)->nullable();
            $table->string('guardian3_name', 100)->nullable();
            $table->string('guardian3_email', 100)->nullable();
            $table->string('guardian3_contact', 20)->nullable();
            $table->string('guardian3_relationship', 100)->nullable();

            $table->enum('status', [
                'Active', 
                'Inactive', 
                'Banned'
            ])->default('Active');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
        Schema::table("players", function ($table) {
            $table->dropSoftDeletes();
        });
    }
};
