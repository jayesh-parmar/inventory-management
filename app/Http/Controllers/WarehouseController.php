<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestWarehouse;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::select('id', 'name')->paginate(10);

        return view('admin.pages.warehouse.index', ['warehouses' => $warehouses]);
    }

    public function add()
    {
        return view('admin.pages.warehouse.form');
    }

    public function store(RequestWarehouse $request)
    {
        Warehouse::create($request->validated());

        return redirect()->route('warehouse.index')->with('success', 'Warehouse added  successfully.');
    }

    public function edit(string $warehouseId)
    {
        $warehouse = Warehouse::select('id', 'name')->find($warehouseId);

        return view('admin.pages.warehouse.form', ['warehouse' => $warehouse]);
    }

    public function update(RequestWarehouse $request, Warehouse $warehouse)
    {
        $warehouse->update($request->validated());

        return redirect()->route('warehouse.index')->with('success', 'Warehouse update successfully.');
    }

    public function destroy(string $warehouseId)
    {
        $warehouse = Warehouse::find($warehouseId);
        $warehouse->delete();
        
        return redirect()->route('warehouse.index')->with('success', 'Warehouse deleted successfully.');
    }
}

