<?php

use App\Models\Size;

it('user can add a new size', function () {

    userLogin();

    $this->post(route('size.store'), [
        'name' => '2020',
    ])
        ->assertStatus(302)
        ->assertRedirect(route('size.index'));

    $this->assertDatabaseHas('sizes', [
        'name' => '2020',
    ]);
});

it('user can update a size', function () {

    userLogin();

    $size = Size::factory()->create(['name' => '2022']);

    $this->post(route('size.update', $size->id), [
        'id' => $size->id,
        'name' => 'update 2022'
    ])
        ->assertRedirect(route('size.index'));

    $this->assertDatabaseHas('sizes', [
        'name' => 'update 2022',
    ]);
});
