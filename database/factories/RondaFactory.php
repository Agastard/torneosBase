<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RondaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_ronda'=> $this->faker->numberBetween(1, 4), // Asumiendo que tienes hasta 4 rondas
            'fecha_inicio' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'fecha_fin' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'torneo_id' => $this->faker->numberBetween(1, 5), // Asumiendo que tienes 5 torneos
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
