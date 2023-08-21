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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 18)->min(18)->max(18)->unique();

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->float('total_price', 8, 2)->comment('Sum of Total Product\'s Current Price');

            $table->string('name')->nullable();
            $table->string('email');
            $table->text('address');
            $table->string('contact_number');

            $table->enum('status', [
                            'Active', 
                            'Running', 
                            'Delivery', 
                            'Completed', 
                            'Canceled'
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
        Schema::dropIfExists('orders');
        Schema::table("orders", function ($table) {
            $table->dropSoftDeletes();
        });
    }
};
