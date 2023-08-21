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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->unique()
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->string('coach_id')
                  ->unique()
                  ->comment('The Coach ID Prefix Should be BSSCOACH. The coach ID Example: BSSCOACH202302010001');

            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->string('position', 50)->default('Coach');
            $table->date('birthdate');
            $table->string('phone_number', 20)->unique();
            $table->string('street_address', 100);
            $table->string('extended_address', 100)->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('postal_code', 10);
            $table->string('usab_license_no', 20)->unique();
            $table->longText('note', 255)->nullable();

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
        Schema::dropIfExists('coaches');
        Schema::table("coaches", function ($table) {
            $table->dropSoftDeletes();
        });
    }
};
