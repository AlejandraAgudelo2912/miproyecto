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

it('create a post', function () {
    //Arrange
    $user = User::factory()->create();
    $post = Post::factory()->make(['user_id'=>$user->id]);

    //Act
    $post->save();

    //Assert
    $this->assertInstanceOf(Post::class, $post);
    $this->assertDatabaseHas('posts', ['title' => $post->title]);
});

it('update a post', function () {
    //Arrange
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id'=>$user->id]);

    //Act
    $post->update(['title' => 'New title']);

    //Assert
    $this->assertInstanceOf(Post::class, $post);
    $this->assertDatabaseHas('posts', ['title' => 'New title']);
});

it('delete a post', function () {
    //Arrange
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id'=>$user->id]);

    //Act
    $post->delete();

    //Assert
    $this->assertInstanceOf(Post::class, $post);
    $this->assertDatabaseMissing('posts', ['title' => $post->title]);
});

