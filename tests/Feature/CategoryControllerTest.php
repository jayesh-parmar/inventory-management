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

it('user can not delete if child category', function () {

    userLogin();

    $parentCategory = Category::factory()->create();
    Category::factory()->create(['parent_id' => $parentCategory->id]);

    $this->post(route('categories.destroy', ['categoryId' => $parentCategory->id]))
    ->assertStatus(302)
    ->assertRedirect(route('categories.index'))
    ->assertSessionHas('error', 'This category cannot be deleted as there are one or more child categories attached.');
    
    $this->assertDatabaseHas('categories', ['id' => $parentCategory->id]);
});