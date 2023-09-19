<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'brand_id', 'color_id', 'size_id', 'status')->paginate(10);
          
        return view('admin.pages.product.index', compact('products'));
    }
    public function add()
    {
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name')->get();
        $sizes = Size::select('id', 'name')->get();    
        return view('admin.pages.product.form', compact('brands','colors','sizes'));
    }
    public function store(ProductValidation $request)
    {
        Product::create($request->validated());

        return redirect()->route('product.index')->with('success',  'Product Added successfully ');
    }
    public function edit(string $productId)
    {
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name')->get();
        $sizes = Size::select('id', 'name')->get(); 
        $product = Product::select('id','name','brand_id','size_id','color_id','status')->find($productId);

        return view('admin.pages.product.form', compact('product','brands','colors','sizes'));
    }

    public function update(ProductValidation $request, Product $product)
    {
        
        $product->update($request->validated());

        return redirect()->route('product.index')->with('success', 'Product Updated successfully.');
    }
}