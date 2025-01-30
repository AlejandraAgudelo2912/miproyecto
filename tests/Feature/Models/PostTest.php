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

it('create a post successfully', function () {
    // Arrange
    $user = User::factory()->create();

    //Act
    $this->actingAs($user);
    $postData = [
        'title' => 'Título 1',
        'body' => 'Body 1',
    ];

    // Act
    $response = $this->post(route('posts.create'), $postData);

    // Assert
    $response->assertRedirect(route('posts.index'));
    $this->assertDatabaseHas('posts', [
        'title' => $postData['title'],
        'body' => $postData['body'],
        'user_id' => $user->id,
    ]);
});

it('updates a post successfully', function () {
    // Arrange
    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->create(['user_id' => $user->id]);

    $updatedData = [
        'title' => 'Updated title',
        'body' => $post->body,
    ];

    // Act
    $response = $this->put(route('posts.update', $post), $updatedData);

    // Assert
    $response->assertRedirect(route('posts.index'));
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => $updatedData['title'],
    ]);
});

it('deletes a post successfully', function () {
    // Arrange
    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->create(['user_id' => $user->id]);

    // Act
    $response = $this->delete(route('posts.destroy', $post));

    // Assert
    $response->assertRedirect(route('posts.index'));
    $this->assertDatabaseMissing('posts', [
        'id' => $post->id,
    ]);
});

