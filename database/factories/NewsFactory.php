<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = fake()->unique()->realTextBetween(400, 800);

        return [
            'title' => fake()->unique()->realTextBetween(15, 35),
            'preview' => substr($content,0,100),
            'content' => $content,
            'user_id' => fake()->randomElement([1,2]),
        ];
    }
}
