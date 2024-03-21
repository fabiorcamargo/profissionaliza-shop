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

        \App\Models\AsaasAccount::create([
            'name' => env('ASAAS_NAME'),
            'token' => env('ASAAS_TOKEN'),
        ]);

        \App\Models\User::create([
            'name' => 'Fábio Camargo',
            'email' => 'fabiorcamargo@gmail.com',
            'cpfCnpj' => '05348908908',
            'phone' => '42991622889',
            'password' => bcrypt('Quem@ma764829')
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
