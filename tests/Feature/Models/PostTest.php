<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('belongs to an user', function () {
    //Arrange
    $user = User::factory()->has(Post::factory())->create();
    $post=Post::factory()->create(['user_id'=>$user->id]);

    //Act
    $postUser = $post->user;

    //Assert
    $this->assertInstanceOf(User::class, $postUser);
    $this->assertEquals($user->id, $postUser->id);
});
