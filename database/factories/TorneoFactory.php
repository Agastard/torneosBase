<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Torneo>
 */
class TorneoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->jobTitle(),
            'tipo_torneo_id' => $this->faker->numberBetween(1, 2), // Asumiendo que tienes 2 tipos de torneos
            'fecha_torneo' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'ubicacion' => $this->faker->city(),
            'descripcion' => $this->faker->paragraph(),
            //'n_mesas'=> $this->faker->numberBetween(2, 8), // Asumiendo que el número de mesas varía entre 3 y 8
            'n_mesas' => 8, // Asignando un valor fijo de 8 mesas para simplificar
            //'n_participantes_x_mesa' => $this->faker->numberBetween(2, 8), // Asumiendo que el número de participantes por mesa varía entre 2 y 8
            'n_participantes_x_mesa' => 4, // Asignando un valor fijo de 4 mesas para simplificar
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
