<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Post::factory(10)->create()->each(function ($post) {
            Comment::factory(5)->create([
                'post_id' => $post->id,
                'user_id' => User::factory(),
            ])->each(function ($comment) use ($post) {
                Comment::factory(3)->create([
                    'post_id' => $post->id,
                    'user_id' => User::factory(),
                    'parent_id' => $comment->id,
                ]);
            });
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
