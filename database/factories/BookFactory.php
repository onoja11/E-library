<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->unique()->word;
        $slug = Str::slug($title);

        $cover = fake()->image(public_path('uploads/covers'), 640,480,null,false);
        return [
            'sku' => Str::ulid(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' =>  $title,
            'slug' => $slug,
            'author' => fake()->name,
            'cover' => $cover,
            'file' => 'book_1727967956_.pdf',
            'description' => fake()->realText()
        ];
    }
}
