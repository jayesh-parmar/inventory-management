<?php

use App\Models\Size;

it('user can add a new size', function () {

    userLogin();

    $this->post(route('size.store'), [
        'name' => '2200',
    ])
    ->assertStatus(302)
    ->assertRedirect(route('size.index'));

    $this->assertDatabaseHas('sizes', [
        'name' => '2200',
    ]);
});

it('user can update a size', function () {

    userLogin();

    $size = Size::where('name', '2200')->first();

     $this->post(route('size.update', $size->id), [
        'name' => 'update 2200',
    ])
    ->assertRedirect(route('size.index'));

    $this->assertDatabaseHas('sizes', [
        'name' => 'update 2200',
    ]);
});
