<?php

use App\Models\User;

function userLogin()
{
    $user = User::factory()->create();
    test()->actingAs($user);
}

uses(
    Tests\TestCase::class,
)->in('Feature');

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
}
