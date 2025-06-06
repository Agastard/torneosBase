<?php

namespace Database\Seeders;

use App\Models\ParticipanteRonda;
use App\Models\ParticipanteTorneo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipanteRondaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* ParticipanteRonda::factory()
            ->count(32)
            ->create(); */
        $n_mesas = 8; //TODO sacaqr del torneo
        $n_participantes_x_mesa = 4;//TODO sacar del torneo

        $_participantes_en_mesa = 0;
        $current_mesa = 1;

        for ($r=1; $r <= 4; $r++) {
            $current_mesa = 1;
            $_participantes_en_mesa = 0;
            if ($r == 1){
                $participantes = ParticipanteTorneo::where('torneo_id', 1) //TODO sacar del torneo
                    ->limit(32)
                    ->get();
            } else {
                $participantes = ParticipanteRonda::where('ronda_id', $r-1)
                    ->orderBy('puntos', 'desc')
                    ->limit(32)
                    ->get();
            }
            foreach ($participantes as $key => $participante) {
                //if ($r == 1) {//Asignar por orden
                    if ($_participantes_en_mesa < $n_participantes_x_mesa) {
                        $_participantes_en_mesa++;
                    } else {
                        $current_mesa++;
                        $_participantes_en_mesa = 1;
                    }
                    $n_mesa = $current_mesa;
                //}//else => asignar por puntos
                ParticipanteRonda::factory()
                    ->create([
                        'participante_id' =>  $participante->participante_id,
                        'ronda_id' => $r,
                        'mesa' => $n_mesa
                    ]);
            }
        }

    }
}
