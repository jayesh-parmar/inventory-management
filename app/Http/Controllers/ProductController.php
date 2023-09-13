<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand','color','size'])->paginate(10);
    
        return view('admin.pages.product.index', ['products' => $products]);
    }
    public function add()
    {
        $brands=Brand::get();
        $colors = Color::get();
        $sizes = Size::get();
        return view('admin.pages.product.add',['brands'=>$brands,'colors'=>$colors,'sizes'=>$sizes]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name|max:255',
        ]);

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
        $brands = Brand::get();
        $colors = Color::get();
        $sizes = Size::get();
        $products = Product::find($productId);
        
        return view('admin.pages.product.update', ['product' => $products, 'brands' => $brands, 'colors' => $colors, 'sizes' => $sizes]);
    }

    public function update(Request $request, string $productId)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,'. $productId .'|max:255',
        ]);

        $product = Product::find($productId);
        $product->name = $request->name;
        $product->brand_id = $request->brand;
        $product->color_id = $request->color;
        $product->size_id = $request->size;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Updated successfully.');
    }  
}
