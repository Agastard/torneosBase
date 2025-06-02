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
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
