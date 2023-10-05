<?php

use App\Models\User;

it('login screen can be rendered', function () {

    $this->get(route('login'))

    ->assertStatus(200);
});

it('users can login and redirected to the dashboard', function () {

    $user = User::factory()->create();

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])
    ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();      
});

it('users can not login with invalid password', function () {

    $user = User::factory()->create();

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

it('users can logout and redirected to the login page', function () {

    $this->post(route('logout'))
    ->assertRedirect(route('login'));

    $this->assertGuest();
});