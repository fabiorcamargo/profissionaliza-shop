<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        /*

        No arquivo .env ensira as variáveis
        ASAAS_NAME='NOME'
        ASAAS_TOKEN='TOKEN'

        ADM_NAME='NOME'
        ADM_MAIL='EMAIL'
        ADM_CPF='CPF'
        ADM_PHONE='TELEFONE'
        ADM_PW='SENHA'

        */

        \App\Models\AsaasAccount::create([
            'name' => env('ASAAS_NAME'),
            'token' => env('ASAAS_TOKEN'),
        ]);

        \App\Models\User::create([
            'name' => env('ADM_NAME'),
            'email' => env('ADM_MAIL'),
            'cpfCnpj' => env('ADM_CPF'),
            'phone' => env('ADM_PHONE'),
            'password' => bcrypt(env('ADM_PW'))
        ]);

        \App\Models\BillingType::create(['name' => 'BOLETO']);
        \App\Models\BillingType::create(['name' => 'CREDIT_CARD']);
        \App\Models\BillingType::create(['name' => 'PIX']);

        \App\Models\ProductCategory::create(['name' => 'PREPARATÓRIO']);
        \App\Models\ProductCategory::create(['name' => 'PROFISSIONALIZANTE']);
        \App\Models\ProductCategory::create(['name' => 'INFORMÁTICA']);

        \App\Models\ProductItemType::create(['name' => 'AULAS']);
        \App\Models\ProductItemType::create(['name' => 'COMPLEMENTOS']);

    }
}
