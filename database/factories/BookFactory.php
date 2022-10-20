<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->paragraph(2),
            'image' => fake()->imageUrl(640, 480, 'animals', true),
            'price' => fake()->randomFloat(1, 5, 50),
            'author' => fake()->name(),
            'nombre_pages' => fake()->randomNumber(),
            'created_at' => now(),
        ];
    }
}
