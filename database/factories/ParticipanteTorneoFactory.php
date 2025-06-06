<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParticipanteTorneo>
 */
class ParticipanteTorneoFactory extends Factory
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
            'torneo_id' => $this->faker->numberBetween(1, 5), // Asumiendo que tienes 5 torneos
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
