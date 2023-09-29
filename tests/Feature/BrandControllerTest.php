<?php

use App\Models\Brand;

it('user can add a new brand', function () {

    $this->userLogin();

    $response = $this->post(route('brand.store'), [
        'name' => 'test',
    ]);
    
    $response->assertStatus(302);
    $response->assertRedirect(route('brand.index'));

    $this->assertDatabaseHas('brands', [
        'name' => 'test',
    ]);  
});

it('user can update a brand', function () {

    $this->userLogin();

    $brand = Brand::where('name', 'test')->first();

    $response = $this->post(route('brand.update', $brand->id), [
        'name' => 'update test',
    ]);
    $response->assertRedirect(route('brand.index'));

    $this->assertDatabaseHas('brands', [
        'name' => 'update test',
    ]);
});