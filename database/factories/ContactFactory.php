<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> fake()->numberBetween(1,10),
            'message' => fake()->paragraph(),
            'username' => fake()->userName(),
            'email' => fake()->safeEmail(),
            'imageUrl' => fake()->imageUrl(),
            'delivered' => fake()->boolean()

        ];
    }
}
