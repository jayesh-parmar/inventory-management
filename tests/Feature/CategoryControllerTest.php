<?php

use App\Models\Category;

it('user can add a new categories', function () {

    userLogin();

    $this->post(route('categories.store'), [
        'name' => 'apple',
    ])
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'));

    $this->assertDatabaseHas('categories', [
        'name' => 'apple',
    ]);
});

it('user can update a categories', function () {

    userLogin();

    $categories = Category::factory()->create(['name' => 'apple11']);

    $this->post(route('categories.update', $categories->id), [
        'id' => $categories->id,
        'name' => 'update apple11'
    ])
        ->assertRedirect(route('categories.index'));

    $this->assertDatabaseHas('categories', [
        'id' => $categories->id,
        'name' => 'update apple11',
    ]);
});

it('user can delete a categories', function () {

    userLogin();

    $categories = Category::factory()->create(['id' => 1, 'name' => 'apple11']);

    $this->post(route('categories.destroy', $categories->id))
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'));

    $this->assertDatabaseMissing('categories', ['id' => $categories->id]);
});
