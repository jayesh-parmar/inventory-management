<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::paginate(10);
        return view('admin.pages.brands.brands', ['brands' => $brand]);
    }
    public function addBrand()
    {
        return view('admin.pages.brands.form');
    }

    public function store(BrandRequest $request)
    {
        Brand::create($request->validated());

        return redirect()->route('brand.index')->with('success', 'New Brand Added successfully .');
    }
   
    public function edit(string $brandId)
    {
        $brands = Brand::find($brandId);
        return view('admin.pages.brands.form', compact('brands'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return redirect()->route('brand.index')->with('success', 'Brand Updated successfully.');
    }  
}