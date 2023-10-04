<?php

use App\Models\Product;


it('user can add a new product', function () {

    userLogin();

    $product = Product::factory()->create();

    $this->post(route('product.store'), [
        'name' => 'PDU',
        'brand_id' => $product->brand_id,
        'size_id' => $product->size_id,
        'color_id' => $product->color_id,
        'status' => '0',
    ])
        ->assertStatus(302)
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', [
        'name' => 'PDU',
        'brand_id' => $product->brand_id,
        'size_id' => $product->size_id,
        'color_id' => $product->color_id,
        'status' => '0',
    ]);
});

it('user can update a product', function () {

    userLogin();

    $product = Product::factory()->create();

    $this->post(route('product.update', $product->id), [
        'id' => $product->id,
        'name' => 'Apple',
        'brand_id' => $product->brand_id,
        'size_id' => $product->size_id,
        'color_id' => $product->color_id,
        'status' => '0',
    ])
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Apple',
        'brand_id' => $product->brand_id,
        'size_id' => $product->size_id,
        'color_id' => $product->color_id,
        'status' => '0',
    ]);
});
