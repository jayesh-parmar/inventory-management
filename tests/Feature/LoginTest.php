<?php

use App\Models\User;

it('login screen can be rendered', function () {

    $this->get('/login')

    ->assertStatus(200);
});

it('users can login using the login screen', function () {

    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ])
    ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();      
});

it('users can not login with invalid password', function () {

    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
