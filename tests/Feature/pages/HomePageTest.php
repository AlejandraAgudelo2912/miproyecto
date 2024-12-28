<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('loads Home page successfully', function () {
    //Arrange
    $response = $this->get('/');
    //Act & Assert
    $response->assertStatus(200);

});

it('shows login and register buttons when not logged in', function () {
    //Arrange
    $response = $this->get('/');
    //Act & Assert
    $response->assertSee('login')
        ->assertSee('register');
});

it('shows profile and logout buttons when logged in', function () {
    //Arrange
    $user = User::factory()->create();
    $this->actingAs($user);
    //Act
    $response = $this->get('/');
    //Assert
    $response->assertSee('profile')
        ->assertSee('logout');
});
