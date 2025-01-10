<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->randomElement(['published', 'draft', 'archived']),
            'visibility' => $this->faker->randomElement(['public', 'private']),
            'cover_image' => $this->faker->imageUrl(),
            'published_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
