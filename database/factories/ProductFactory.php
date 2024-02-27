<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nameAr' => fake()->name(),
            'description' => fake()->sentence(),
            'descriptionAr' => fake()->sentence(),
            'size' => fake()->word(),
            'quantityPerPacket' => fake()->numberBetween(1,100),
            'bestSelling' => fake()->boolean(),
            'imageUrl' => fake()->imageUrl(),
            'category_id' => fake()->numberBetween(1,4),
            'public_id' => fake()->streetName()



        ];
    }
}
