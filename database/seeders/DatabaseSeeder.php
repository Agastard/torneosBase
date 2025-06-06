<?php

namespace Database\Seeders;

use App\Models\ParticipanteRonda;
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
            TestDatosTorneosSeeder::class,
        ]);

       /*   $this->call([
           TipoTorneoSeed::class,
            TorneoSeed::class,
            ParticipanteSeeder::class,
            RondaSeeder::class,
            ParticipanteTorneoSeeder::class,
            ParticipanteRondaSeeder::class,

        ]);*/
       /*  ParticipanteRonda::factory()->create([
            'participante_id' => $this->faker->numberBetween(1, 10), // Asumiendo que tienes 10 participantes
            'ronda_id' => $this->faker->numberBetween(1, 4), // Asumiendo que tienes 5 rondas
            'puntos' => $this->faker->numberBetween(0, 10),
        ]); */
    }
}
