<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
            'tags' => $this->faker->word(),
            'content' => $this->faker->paragraph(20),
            'content_html' => $this->faker->randomHtml(),
            'category' => 2,
            'user_id' => 1,
            'status' => 1,
        ];
    }
}
