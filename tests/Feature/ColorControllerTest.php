<?php

use App\Models\Color;

it('user can add a new color', function () {

    userLogin();

    $this->post(route('color.store'), [
        'name' => 'red',
    ])
        ->assertStatus(302)
        ->assertRedirect(route('color.index'));

    $this->assertDatabaseHas('colors', [
        'name' => 'red',
    ]);
});

it('user can update a color', function () {

    userLogin();

    $color = Color::factory()->create(['name' => 'red11']);

    $this->post(route('color.update', $color->id), [
        'id' => $color->id,
        'name' => 'update red11'
    ])
        ->assertRedirect(route('color.index'));

    $this->assertDatabaseHas('colors', [
        'id' => $color->id,
        'name' => 'update red11',
    ]);
});
