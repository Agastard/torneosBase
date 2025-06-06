<?php

namespace Database\Seeders;

use App\Models\Ronda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RondaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 4; $i++) {
            Ronda::factory()
                ->create([
                    'numero_ronda' => $i,
                    'torneo_id' => 1,
            ]);
        }
    }
}
