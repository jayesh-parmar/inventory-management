<?php

namespace Tests\Feature;

use App\Models\User;

trait userLogin
{
    protected function userLogin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }
}