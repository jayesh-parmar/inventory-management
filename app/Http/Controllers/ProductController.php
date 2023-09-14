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
        $products = Product::with([
            'brand:id,name',   
            'color:id,name',   
            'size:id,name',    
        ])->paginate(10);

        return view('admin.pages.product.index', compact('products'));
    }
    public function add()
    {
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name')->get();
        $sizes = Size::select('id', 'name')->get();

        return view('admin.pages.product.form',['brands'=>$brands,'colors'=>$colors,'sizes'=>$sizes]);
    }
    public function store( ProductValidation $request)
    {
        Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand,
            'color_id' =>$request->color,
            'size_id'=>$request->size,
            'status'=>$request->status
        ]);
    
        return redirect()->route('product.index')->with('success',  'Product Added successfully ');
    }
    public function edit(string $productId)
    {
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name')->get();
        $sizes = Size::select('id', 'name')->get();
        $product = Product::find($productId);
        
        return view('admin.pages.product.form', ['product' => $product ,'brands' => $brands, 'colors' => $colors, 'sizes' => $sizes]);
    }

    public function update(ProductValidation $request, string $productId)
    {
        $product = Product::find($productId);
        
        $product->update([
            'name' => $request->name,
            'brand_id' => $request->brand,
            'color_id' => $request->color,
            'size_id' => $request->size,
            'status' => $request->status,
        ]);

        return redirect()->route('product.index')->with('success', 'Product Updated successfully.');
    }

}