<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::select('id', 'name')->paginate(10);
        
        return view('admin.pages.brands.brands', ['brands' => $brand]);
    }
    public function addBrand()
    {
        return view('admin.pages.brands.form');
    }

    public function store(BrandRequest $request)
    {
        Brand::create($request->all());

        return redirect()->route('brand.index')->with('success', 'New Brand Added successfully .');
    }
   
    public function edit(string $brandId)
    {
        $brand = Brand::select('id', 'name')->find($brandId);

        return view('admin.pages.brands.form', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return redirect()->route('brand.index')->with('success', 'Brand Updated successfully.');
    }  
}