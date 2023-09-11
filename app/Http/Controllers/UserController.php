<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class UserController extends Controller
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
            'brand_name' => 'required|unique:brands,brand_name|max:255',
        ]);
        Brand::create([
            'brand_name' => $request->brand_name, 
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
        $brand = Brand::find($brandId);
        if($brand->brand_name !== $request->brand_name ){
            $request->validate([
                'brand_name' => 'required|unique:brands,brand_name|max:255',
            ]);
        }
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return redirect()->route('brand.index')->with('success', ' Brand Updated successfully.');
    }  
}