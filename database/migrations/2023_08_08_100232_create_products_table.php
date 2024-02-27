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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->unique();
            $table->string('name');
            $table->integer('quantity')->default(1);
            $table->float('purchase_price', 8, 2);
            $table->float('price', 8, 2);
            $table->json('colors')->nullable();
            $table->json('sizes')->nullable();
            $table->longText('description');
            $table->boolean('need_note')->default(false);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::table("products", function ($table) {
            $table->dropSoftDeletes();
        });
    }
};
