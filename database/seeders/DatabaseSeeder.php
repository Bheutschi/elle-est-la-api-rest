<?php

namespace Database\Seeders;

use App\Models\Commande;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Commande::factory(10)->create();
        Commande::create([
            'id' => '6d4acb24-e4e4-33bd-a667-677794a653af',
            'total' => 49.99,
            'status' => 'En attente'
        ]);
    }
}
