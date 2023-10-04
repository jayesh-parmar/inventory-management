<?php

use App\Models\Product;

it('user can add a new product', function () {

    userLogin();

    $product = Product::factory()->create();

    $productData = [
        'name' => 'PDU',
        'brand_id' => $product->brand_id,
        'size_id' => $product->size_id,
        'color_id' => $product->color_id,
        'status' => true,
    ];

    $this->post(route('product.store'), $productData)
        ->assertStatus(302)
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', $productData);
});

it('user can update a product', function () {

    userLogin();

    $product = Product::factory()->create();
    $productData = [
        'name' => 'Apple',
        'brand_id' => $product->brand_id,
        'size_id' => $product->size_id,
        'color_id' => $product->color_id,
        'status' => false,
    ];

    $this->post(route('product.update', $product->id), $productData )
        ->assertStatus(302)
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', $productData);
});