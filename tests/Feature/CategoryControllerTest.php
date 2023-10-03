<?php

use App\Models\Category;

it('user can add a new categories', function () {

    userLogin();

    $this->post(route('categories.store'), [
        'name' => 'test1',
    ])
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'));

    $this->assertDatabaseHas('categories', [
        'name' => 'test1',
    ]);
});

it('user can update a categories', function () {

    userLogin();

    $categories = Category::factory()->create(['name' => 'test']);

    $this->post(route('categories.update', $categories->id), [
        'id' => $categories->id,
        'name' => 'update test'
    ])
        ->assertRedirect(route('categories.index'));

    $this->assertDatabaseHas('categories', [
        'name' => 'update test',
    ]);
});
