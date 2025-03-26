<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement(['En attente', 'En cours', 'Expédiée', 'Annulée'])
        ];
    }
}
