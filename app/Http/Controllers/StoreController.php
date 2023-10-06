<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::select('id', 'name')->paginate(10);

        return view('admin.pages.store.index', ['stores' => $stores]);
    }

    public function add()
    {
        return view('admin.pages.store.form');
    }

    public function store(StoreRequest $request)
    {
        Store::create($request->validated());

        return redirect()->route('store.index')->with('success', 'store Added successfully.');
    }

    public function edit(string $storeId)
    {
        $store = Store::select('id', 'name')->find($storeId);

        return view('admin.pages.store.form', ['store' => $store]);
    }

    public function update(StoreRequest $request, Store $store)
    {
        $store->update($request->validated());

        return redirect()->route('store.index')->with('success', 'store Update successfully.');
    }

    public function destroy(string $storeId)
    {
        $store = Store::find($storeId);
        $store->delete();
        
        return redirect()->route('store.index')->with('success', 'Store deleted successfully.');
    }
}
