<?php
namespace Tests;

use App\Models\User;

trait UserLogin{

    public $user;

    public function setUpUser(){

        $this->user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
    }
}