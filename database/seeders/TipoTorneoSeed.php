<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoTorneo;

class TipoTorneoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoTorneo::create([
            'nombre' => 'Suizo',
            'descripcion' => 'Torneo de tipo Suizo.'
        ]);
        TipoTorneo::create([
            'nombre' => 'Clasificatorio',
            'descripcion' => 'Torneo de tipo Clasificatorio.'
        ]);
    }
}
