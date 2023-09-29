<?php

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;


it('user can add a new brand', function () {

    userLogin();

    $this->post(route('brand.store'), [
        'name' => 'test1',
    ])
    ->assertStatus(302)
    ->assertRedirect(route('brand.index'));

    $this->assertDatabaseHas('brands', [
        'name' => 'test1',
    ]);  
});

it('user can update a brand', function () {

    userLogin();

    $brand = Brand::factory()->create(['name' => 'test']);

    $this->post(route('brand.update', ['brand' => $brand->id]), [
        'name' => 'update test',
    ])
    ->assertRedirect(route('brand.index'));

    $this->assertDatabaseHas('brands', [
        'name' => 'update test',
    ]);
});