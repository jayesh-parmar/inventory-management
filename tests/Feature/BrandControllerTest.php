<?php

use App\Models\Brand;
use App\Models\User;

it('user can add a new brand', function () {

    $user = User::factory()->create();
    $response = $this->actingAs($user);

    $response = $this->from(route('brand.create'))->post(route('brand.store'), [
        'name' => 'test',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect(route('brand.index'));
    $brand = Brand::first();

    $this->assertEquals($brand->name, 'test');
});

it('user can update a brand', function () {

    $user = User::factory()->create();
    $response = $this->actingAs($user);

    $response = $this->from(route('brand.create'))->post(route('brand.store'), [
        'name' => 'test',
    ]);

    $brand = Brand::first();
    $response = $this->post(route('brand.update', $brand->id), [
        'name' => 'update test',
    ]);

    $update_brand = Brand::first();
    $this->assertEquals('update test', $update_brand->name);

    $response->assertRedirect(route('brand.index'));
});