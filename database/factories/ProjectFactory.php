<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->realTextBetween(10, 25),
            'description' => fake()->unique()->realTextBetween(20, 50),
            'age_limit_id' => fake()->numberBetween(1, 3),
            'format_id' => fake()->numberBetween(1, 3),
        ];
    }
}
