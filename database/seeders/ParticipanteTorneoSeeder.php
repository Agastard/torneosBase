<?php

namespace Database\Seeders;

use App\Models\ParticipanteTorneo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipanteTorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ParticipanteTorneo::factory()->count(32)->create();
        for ($i = 1; $i <= 32; $i++) {
            ParticipanteTorneo::factory()
                ->create([
                    'participante_id' => $i,
                    'torneo_id' => 1,
                ]);
        }
    }
}
