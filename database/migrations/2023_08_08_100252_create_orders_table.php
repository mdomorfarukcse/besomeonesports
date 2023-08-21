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
            $table->string('order_id')->unique();

            $table->foreignId('product_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreignId('user_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->integer('quantity')->default(1);
            $table->integer('current_price')->comment('Current Product Price / Unit');
            $table->integer('total_price')->comment('Quantity * CurrentPrice');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
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
