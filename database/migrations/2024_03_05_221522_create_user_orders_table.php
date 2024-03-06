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
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('asaas_account_id')->nullable()->constrained('asaas_accounts');
            $table->string('billingType_id')->constrained('billing_types');
            $table->string('value')->nullable();
            $table->string('installmentCount')->nullable();
            $table->string('installmentValue')->nullable();
            $table->string('dueDate');
            $table->string('postalCode');
            $table->string('addressNumber');
            $table->string('description');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_orders');
    }
};
