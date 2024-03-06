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
    }
}
