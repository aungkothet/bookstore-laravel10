<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Publisher;
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
    public function definition(): array
    {
        $author_id = Author::get()->random()->id;
        $publisher_id = Publisher::get()->random()->id;
        return [
            'name' => fake()->sentence(6),
            'description' => fake()->paragraphs(5, true),
            'price' => fake()->randomFloat(2, 10, 500),
            'image_url' => fake()->imageUrl(),
            'isbn13_code' => fake()->isbn13(),
            'published_date' => fake()->date('Y-m-d', '-5 years'),
            'discount_percentage' => fake()->numberBetween(0, 100),
            'author_id' => $author_id,
            'publisher_id' => $publisher_id,
        ];
    }
}
