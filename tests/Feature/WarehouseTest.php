<?php

use App\Models\Warehouse;

it('user can add a new warehouse', function () {

    userLogin();

    $this->post(route('warehouse.store'), [
        'name' => 'Amd',
    ])
        ->assertStatus(302)
        ->assertRedirect(route('warehouse.index'));

    $this->assertDatabaseHas('warehouses', [
        'name' => 'Amd',
    ]);
});

it('user can update a warehouse', function () {

    userLogin();

    $warehouse = Warehouse::factory()->create(['name' => '2022']);

    $this->post(route('warehouse.update', $warehouse->id), [
        'id' => $warehouse->id,
        'name' => 'update 2022'
    ])
        ->assertRedirect(route('warehouse.index'));

    $this->assertDatabaseHas('warehouses', [
        'id' => $warehouse->id,
        'name' => 'update 2022',
    ]);
});

it('user can delete a warehouse', function () {
    userLogin();

    $warehouse = Warehouse::factory()->create();

    $this->get(route('warehouse.destroy', ['warehouseId' => $warehouse->id]))
        ->assertRedirect(route('warehouse.index'))
        ->assertSessionHas('success', 'Warehouse deleted successfully.');

    $this->assertDatabaseMissing('warehouses', ['id' => $warehouse->id]);
});

it('user cannot visit the warehouses page without login', function () {
    $this->get(route('warehouse.index'))
        ->assertRedirect(route('login'));
});
