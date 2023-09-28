<?php

use App\Models\User;

it('login a successful ', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->withSession(['banned' => false])
        ->get('/login');
});