<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Voyageur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Voyageur::upsert([
            ['nom' => 'TOKOUDAGBA', 'prenom' => 'Cyprien', 'ville' => 'Cotonou', 'region' => 'Sud', 'sexe' => 'M'],
            ['nom' => 'DAGBA', 'prenom' => 'Valerie', 'ville' => 'Ab-Calavi', 'region' => 'Est', 'sexe' => 'F'],
            ['nom' => 'TOKOU', 'prenom' => 'Elen', 'ville' => 'Ouidah', 'region' => 'Sud', 'sexe' => 'M'],
            ['nom' => 'DAGBATOKOU', 'prenom' => 'Albert', 'ville' => 'Parakou', 'region' => 'Nord', 'sexe' => 'F'],
        ],['nom','prenom','ville','region','sexe']);
    }
}
