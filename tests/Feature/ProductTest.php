<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

it('user can add a new product', function () {

    userLogin();

    $categoryIds = Category::factory(3)->create()->pluck('id')->map(function ($id) {
        return (string) $id;
    })->toArray();

    $productData = [
        'name' => 'PDU',
        'brand_id' => Brand::factory()->create()->id,
        'size_id' => Size::factory()->create()->id,
        'color_id' => Color::factory()->create()->id,
        'status' => true,
        'category_ids' => $categoryIds,
    ];

    $this->post(route('product.store'), $productData)
         ->assertStatus(302)
         ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', [
        'name' => 'PDU',
        'brand_id' => $productData['brand_id'],
        'size_id' => $productData['size_id'],
        'color_id' => $productData['color_id'],
        'status' => $productData['status'],
    ]);

    $product = Product::where('name', 'PDU')->first();
    $this->assertTrue(
          $product->categories->whereIn('id', $categoryIds)->isNotEmpty());
});

it('user can update a product', function () {

    userLogin();

    $categories = Category::factory(3)->create();
    $categoryIds = $categories->pluck('id')->map(function ($id) {
        return (string) $id;
    })->toArray();
    
    $productData = Product::factory()->create([
        'name' => 'PDU',
        'brand_id' => Brand::factory()->create()->id,
        'size_id' => Size::factory()->create()->id,
        'color_id' => Color::factory()->create()->id,
        'status' => true
    ]);

    $updateProductData = [
        'name' => 'PDU Update',
        'brand_id' => $productData->brand_id,
        'size_id' => $productData->size_id,
        'color_id' => $productData->color_id,
        'status' => false,
        'category_ids' => $categoryIds,
    ];
    
    $this->post(route('product.update', $productData->id), $updateProductData)
        ->assertStatus(302)
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', [
        'name' => 'PDU Update',
        'brand_id' => $productData->brand_id,
        'size_id' => $productData->size_id,
        'color_id' => $productData->color_id,
        'status' => false,
    ] );

    $firstCategoryId = $categories->first()->id;
    $this->assertDatabaseHas('category_product', [
        'category_id' => $firstCategoryId,
    ]);
});

it('user cannot add or update product with missing required fields', function (){
    
    userLogin();

    $productData = Product::factory()->create([
        'name' => 'PDU',
        'brand_id' => Brand::factory()->create()->id,
        'size_id' => Size::factory()->create()->id,
        'color_id' => Color::factory()->create()->id,
        'status' => true,]);

    $updateProductData = [
        
        'brand_id' => $productData->brand_id,
        'size_id' => $productData->size_id,
        'color_id' => $productData->color_id,
        'status' => false,
    ];    
    
    $this->post(route('product.update', $productData->id), $updateProductData)
        ->assertStatus(302)
        ->assertSessionHasErrors();

    $this->assertTrue(session('errors')->has('name'), 'The name field is required.');        
});