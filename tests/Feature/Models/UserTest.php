<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has posts', function () {
    //Arrange
    $user = User::factory()->create();
    $user->posts()->save(Post::factory()->make());

    //Act & Assert
    $user->refresh();
    expect($user->posts)
        ->toHaveCount(1)
        ->each->toBeInstanceOf(Post::class);
});
