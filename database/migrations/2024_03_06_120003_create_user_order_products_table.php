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
        Schema::create('user_order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_order_id')->constrained('user_orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_order_products');
    }
};
