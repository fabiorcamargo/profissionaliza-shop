<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        Schema::create('asaas_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreignId('asaas_account_id')->constrained('asaas_accounts');
            $table->string("asaas_customer")->nullable();
            $table->string("name");
            $table->string("email")->unique();
            $table->string("mobilePhone", 20)->nullable();
            $table->string("cpfCnpj", 18);
            $table->string("postalCode", 8)->nullable();
            $table->string("addressNumber")->nullable();
            $table->string("externalReference")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asaas_customers');
    }
};
