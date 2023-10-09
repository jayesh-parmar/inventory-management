<?php

use App\Models\Store;

it('user can add a new store', function () {

    userLogin();

    $this->post(route('store.store'), [
        'name' => '2020',
    ])
        ->assertStatus(302)
        ->assertRedirect(route('store.index'));

    $this->assertDatabaseHas('stores', [
        'name' => '2020',
    ]);
});

it('user can update a store', function () {

    userLogin();

    $store = Store::factory()->create(['name' => '2022']);

    $this->post(route('store.update', $store->id), [
        'id' => $store->id,
        'name' => 'update 2022'
    ])
        ->assertRedirect(route('store.index'));

    $this->assertDatabaseHas('stores', [
        'id' => $store->id,
        'name' => 'update 2022',
    ]);
});

it('user can delete a store', function () {
    userLogin();

    $store = Store::factory()->create();

    $response = $this->get(route('store.destroy', ['storeId' => $store->id]));

    $response->assertRedirect(route('store.index'))
        ->assertSessionHas('success', 'Store deleted successfully.');

    $this->assertDatabaseMissing('stores', ['id' => $store->id]);
});

it('user cannot visit the stores page without login', function () {
    $this->get(route('store.index'))
        ->assertRedirect(route('login')); 
});