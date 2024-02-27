<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'product_id'=> fake()->numberBetween(2,13),
            'rate' => fake()->numberBetween(1.0,5.0),
            'review' => fake()->paragraph(),
            'username' => fake()->userName(),
            'email' => fake()->safeEmail(),
            'imageUrl' => fake()->imageUrl()


        ];
    }
}
