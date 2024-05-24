<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(gender:'male'),
            'address' =>fake()->address(),
            'birthdate' => fake()->date(),
            'connum' => fake()->phoneNumber(),
            'jerseyno'=>fake()->numberBetween(0,99),
        ];
    }
}
