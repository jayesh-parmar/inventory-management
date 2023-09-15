<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'brand_id', 'color_id', 'size_id', 'status')->with([
            'brand',   
            'color',   
            'size',    
        ])->paginate(10);
          
        return view('admin.pages.product.index', compact('products'));
    }
    public function add()
    {        
        return view('admin.pages.product.form');
    }
    public function store( ProductValidation $request)
    {
        $product = $request->validated();
        Product::create($product);

        return redirect()->route('product.index')->with('success',  'Product Added successfully ');
    }
    public function edit(string $productId)
    {
        $product = Product::find($productId);

        return view('admin.pages.product.form', compact('product'));
    }

    public function update(ProductValidation $request, Product $product)
    {
        $products = $request->validated();
        $product->update($products);

        return redirect()->route('product.index')->with('success', 'Product Updated successfully.');
    }
}