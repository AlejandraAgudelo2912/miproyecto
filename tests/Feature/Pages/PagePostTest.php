<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('loads Post page successfully', function () {
    //Arrange
    $response=$this->get('/posts');
    //Act & Assert
    $response->assertStatus(200);
});

it('shows all posts published', function () {
    //Arrange
    $post = Post::factory(3)->create(['status'=>'published']);
    $response=$this->get('/posts');

    //Act & Assert
    $response->assertSee($post[0]->title)
        ->assertSee($post[1]->title)
        ->assertSee($post[2]->title);
});

it('does not show unpublished posts', function () {
    //Arrange
    $post = Post::factory()->create(['status'=>'draft']);
    $post2 = Post::factory()->create(['status'=>'published']);
    $response=$this->get('/posts');

    //Act & Assert
    $response->assertDontSee($post->title)
        ->assertSee($post2->title);
});
