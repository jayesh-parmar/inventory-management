<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::paginate(10);
        return view('admin.pages.brands.brands', ['brands' => $brand]);
    }
    public function addBrand()
    {
        return view('admin.pages.brands.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name|max:255',
        ]);
        Brand::create([
            'name' => $request->name, 
        ]);
        return redirect()->route('brand.index')->with('success', 'New Brand Added successfully .');
    }
   
    public function edit(string $brandId)
    {
        $brand = Brand::find($brandId);
        return view('admin.pages.brands.update',['brands' => $brand]);
    }

    public function update(Request $request, string $brandId)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,'.$brandId.'|max:255',
        ]);
        $brand = Brand::find($brandId);
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brand.index')->with('success', ' Brand Updated successfully.');
    }  
}