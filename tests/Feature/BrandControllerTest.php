<?php

use App\Models\Brand;
use App\Models\User;

it('user can add a new brand', function () {

    $user = User::factory()->create();
    $response = $this->actingAs($user);

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

    $user = User::factory()->create();
    $response = $this->actingAs($user);

    $brand = Brand::where('name', 'test')->first();
    
    $response = $this->post(route('brand.update', $brand->id), [
        'name' => 'update test',
    ]);

    $this->assertDatabaseHas('brands', [
        'name' => 'update test',
    ]);

    $response->assertRedirect(route('brand.index'));
});