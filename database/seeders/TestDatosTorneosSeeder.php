<?php

namespace Database\Seeders;

use App\Models\ParticipanteRonda;
use App\Models\ParticipanteTorneo;
use App\Models\Ronda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestDatosTorneosSeeder extends Seeder
{
    /**
     * Aquí se forzaran datos de prueba para los torneos.
     * Esto es para poder probar el sistema sin necesidad de crear torneos reales.
     */
    public function run(): void
    {
        /* Flujo de Datos para crear y acabar un torneo
        * 1. Crear Torneo (si es necesario)
        * 3. Crear Participantes (si es necesario)
        * 4. Asignar Participantes a Torneo
        * 2. Crear Ronda(s)
        * 5. Asignar Participantes a Mesas y Rondas
        * 7. Asignar Puntos a Participantes en Rondas (en realidad, el seeder lo hará junto con el anterior puesto)
        * 8. Asignar Ganadores de Rondas(innecesario en este punto)
        * 9. Asignar Ganador de Torneo (innecesario en este punto)
        */
        /*

        SET FOREIGN_KEY_CHECKS = 0;
        TRUNCATE TABLE `torneosappbase`.`participantesrondas`;
        TRUNCATE TABLE `torneosappbase`.`rondas`;
        TRUNCATE TABLE `torneosappbase`.`participantestorneos`;
        SET FOREIGN_KEY_CHECKS = 1;

        SELECT rondas.numero_ronda,mesa,puntos,participantes.nombre,participante_id
        from rondas
        join participantesrondas on participantesrondas.ronda_id = rondas.id
        JOIN participantes on participantes.id = participante_id
        WHERE rondas.torneo_id =2
        ORDER by numero_ronda, mesa ASC, puntos desc;

        SELECT SUM(puntos) as `Sumatorio`,participantes.nombre,participante_id
        from rondas
        join participantesrondas on participantesrondas.ronda_id = rondas.id
        JOIN participantes on participantes.id = participante_id
        WHERE rondas.torneo_id =2
        GROUP by participantesrondas.participante_id
        ORDER by `Sumatorio` desc;
        */

        // TODO probar flujo con empates.
        // Es posible que tengamos que crear el campo puntos_partida para un mejor desempate.

        $torneo_id = 2;
        $this->asignarParticipantesAlTorneo($torneo_id, 16);
        $rondas_ids = $this->createRondas($torneo_id, 4);

        $this->asignarParticipantesARondaYMesa($torneo_id, $rondas_ids);
    }
    public function asignarParticipantesAlTorneo($torneo_id, $n_participantes)
    { // AAsumimos que ya estan creados y tienen ids que comienzas desde el 0
        for ($i = 1; $i <=  $n_participantes; $i++) {
            ParticipanteTorneo::factory()
                ->create([
                    'participante_id' => $i,
                    'torneo_id' => $torneo_id,
                ]);
        }
    }
    public function createRondas($torneo_id, $n_rondas = 4)
    {
        $rondas_ids = [];
        for ($i = 1; $i <= $n_rondas; $i++) {
            $rondas_ids[] = Ronda::factory()
                ->create([
                    'numero_ronda' => $i,
                    'torneo_id' => $torneo_id,
                ])->id;
        }
        return $rondas_ids;
    }
    public function asignarParticipantesARondaYMesa($torneo_id, $rondas_ids =[]){
        $n_mesas = 8; //TODO sacaqr del torneo
        $n_participantes_x_mesa = 4; //TODO sacar del torneo

        $_participantes_en_mesa = 0;
        $current_mesa = 1;

        $puntos_datos = [
            1 => 6, // 1er puesto
            2 => 4, // 2do puesto
            3 => 2, // 3er puesto
            4 => 0, // 4to puesto
        ]; // Esto es porque hay cuatro en la mesa, si hubiera más esto crecería

        for ($r = 1; $r <= count($rondas_ids); $r++) {
            $current_mesa = 1;
            $_participantes_en_mesa = 0;
            $ronda_id_objetivo = $rondas_ids[$r -1]; // Si es la primera ronda, se asigna la primera ronda, si no, se asigna la ronda anterior
            if ($r == 1) {
                $participantes = ParticipanteTorneo::where('torneo_id', $torneo_id)
                    ->limit(value: 16) // Asignamos los primeros 32 participantes del torneo
                    ->get();
            } else { // En caso de existir rondas, se signaran mesas según puntuaje anterior.
                $participantes = ParticipanteRonda::where('ronda_id', $rondas_ids[$r - 2])
                    ->orderBy('puntos', 'desc')
                    ->get();
            }

            foreach ($participantes as $key => $participante) {

                if ($_participantes_en_mesa < $n_participantes_x_mesa) {
                    $_participantes_en_mesa++;
                } else {
                    $current_mesa++;
                    $_participantes_en_mesa = 1;
                }
                $n_mesa = $current_mesa;
                $puntos_a_dar = $puntos_datos[$_participantes_en_mesa];
                ParticipanteRonda::factory()
                    ->create([
                        'participante_id' =>  $participante->participante_id,
                        'ronda_id' => $ronda_id_objetivo,
                        'mesa' => $n_mesa,
                        'puntos'=> $puntos_a_dar
                    ]);
            }
        }
    }

}
