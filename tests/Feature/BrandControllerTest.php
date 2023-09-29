<?php

use App\Models\Brand;

it('user can add a new brand', function () {

    userLogin();

    $this->post(route('brand.store'), [
        'name' => 'test',
    ])
    ->assertStatus(302)
    ->assertRedirect(route('brand.index'));

    $this->assertDatabaseHas('brands', [
        'name' => 'test',
    ]);  
});

it('user can update a brand', function () {

    userLogin();

    $brand = Brand::where('name', 'test')->first();

    $this->post(route('brand.update', $brand->id), [
        'name' => 'update test',
    ])
    ->assertRedirect(route('brand.index'));

    $this->assertDatabaseHas('brands', [
        'name' => 'update test',
    ]);
});