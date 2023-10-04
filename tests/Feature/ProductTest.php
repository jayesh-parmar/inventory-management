<?php

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

it('user can add a new product', function () {

    userLogin();

    $productData = [
        'name' => 'PDU',
        'brand_id' => Brand::factory()->create()->id,
        'size_id' => Size::factory()->create()->id,
        'color_id' => Color::factory()->create()->id,
        'status' => true,
    ];

    $this->post(route('product.store'), $productData)
        ->assertStatus(302)
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', $productData);
});

it('user can update a product', function () {

    userLogin();

    $productData = Product::factory()->create([
        'name' => 'PDU',
        'brand_id' => Brand::factory()->create()->id,
        'size_id' => Size::factory()->create()->id,
        'color_id' => Color::factory()->create()->id,
        'status' => true,]);
    
    $this->post(route('product.update', $productData->id), [
        'name' => 'PDU Update',
        'brand_id' => $productData->brand_id,
        'size_id' => $productData->size_id,
        'color_id' => $productData->color_id,
        'status' => false,
    ]  )
        ->assertStatus(302)
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', [
        'name' => 'PDU Update',
        'brand_id' => $productData->brand_id,
        'size_id' => $productData->size_id,
        'color_id' => $productData->color_id,
        'status' => false,
    ]);
});
