<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows post details', function () {
    //Arrange
    $post = Post::factory()->create();

    //Act
    $response=$this->get('/posts/'.$post->slug);

    //Assert
    $response->assertStatus(200)
        ->assertSee($post->title)
        ->assertSee($post->body);

});
