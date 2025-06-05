<?php

namespace Database\Seeders;

use App\Models\Ronda;
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

        $this->call([
            TipoTorneoSeed::class,
            TorneoSeed::class,
            ParticipanteSeeder::class,
            RondaSeeder::class,
            ParticipanteTorneoSeeder::class,
            ParticipanteRondaSeeder::class,
        ]);
    }
}
