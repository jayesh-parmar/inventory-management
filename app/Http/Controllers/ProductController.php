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
            'brand',   
            'color',   
            'size',    
        ])->select('id','name','brand_id','color_id','size_id','status')->paginate(10);
          
        return view('admin.pages.product.index', compact('products'));
    }
    public function add()
    {        
        return view('admin.pages.product.form');
    }
    public function store( ProductValidation $request)
    {
        Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'color_id' =>$request->color_id,
            'size_id'=>$request->size_id,
            'status'=>$request->status
        ]);
    
        return redirect()->route('product.index')->with('success',  'Product Added successfully ');
    }
    public function edit(string $productId)
    {
        $product = Product::find($productId);

        return view('admin.pages.product.form', compact('product'));
    }

    public function update(ProductValidation $request, string $productId)
    {
        $product = Product::find($productId);
        
        $product->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'status' => $request->status,
        ]);

        return redirect()->route('product.index')->with('success', 'Product Updated successfully.');
    }
}