<?php

use App\Models\Color;

it('user can add a new color', function () {

    userLogin();

    $response = $this->post(route('color.store'), [
        'name' => 'red',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect(route('color.index'));

    $this->assertDatabaseHas('colors', [
        'name' => 'red',
    ]);
});

it('user can update a color', function () {

    userLogin();

    $color = Color::where('name', 'red')->first();

    $response = $this->post(route('color.update', $color->id), [
        'name' => 'update red',
    ]);
    $response->assertRedirect(route('color.index'));

    $this->assertDatabaseHas('colors', [
        'name' => 'update red',
    ]);
});
