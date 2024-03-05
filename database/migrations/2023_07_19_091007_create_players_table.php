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
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->date('birthdate')->nullable();
            $table->string('contact_number', 20);
            $table->string('street_address', 100);
            $table->string('extended_address', 100)->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('postal_code', 10);
            $table->string('position', 50)->nullable();
            $table->float('height', 4)->nullable()->comment('Example: 5.7 (5 Foot 7 Inch)');
            $table->float('weight', 6)->nullable()->comment('Example: 50.00 (50 KG 0 Gram)');
            $table->longText('note', 255)->nullable();

            // Parrent Info
            $table->string('father_name', 100);
            $table->string('father_email', 100)->nullable();
            $table->string('father_contact', 20)->nullable();
            $table->string('mother_name', 100);
            $table->string('mother_email', 100)->nullable();
            $table->string('mother_contact', 20)->nullable();

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
