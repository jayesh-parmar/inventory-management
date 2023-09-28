<?php
namespace Tests;

use App\Models\User;

trait UserLogin{

    public $user;

    public function setUpUser(){

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/login');
    }
}