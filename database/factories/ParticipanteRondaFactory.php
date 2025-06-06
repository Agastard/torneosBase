<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParticipanteRonda>
 */
class ParticipanteRondaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'participante_id' => $this->faker->numberBetween(1, 10), // Asumiendo que tienes 10 participantes
            'ronda_id' => $this->faker->numberBetween(1, 4), // Asumiendo que tienes 5 rondas
            'puntos' => $this->faker->numberBetween(0, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
