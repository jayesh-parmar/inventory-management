<?php

use App\Models\Size;

it('user can add a new size', function () {

    userLogin();

    $response = $this->post(route('size.store'), [
        'name' => '2200',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect(route('size.index'));

    $this->assertDatabaseHas('sizes', [
        'name' => '2200',
    ]);
});

it('user can update a size', function () {

    userLogin();

    $size = Size::where('name', '2200')->first();

    $response = $this->post(route('size.update', $size->id), [
        'name' => 'update 2200',
    ]);
    $response->assertRedirect(route('size.index'));

    $this->assertDatabaseHas('sizes', [
        'name' => 'update 2200',
    ]);
});
