<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\ProductValidation;
use App\Models\Brand;
use App\Models\Category;
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
        $categories = Category::select('id', 'name')->get();
        $statuses = StatusEnum::getStatusesString();

        return view('admin.pages.product.form', compact('brands', 'colors', 'sizes', 'categories', 'statuses'));
    }  

    public function store(ProductValidation $request)
    {
        $product = Product::create($request->validated());
       
        $this->attachCategories($product, $request->validated()['category_ids']);

        return redirect()->route('product.index')->with('success',  'Product added successfully.');
    }

    private function attachCategories($product, $categoryIds)
    {
        $product->categories()->attach($categoryIds);
    }

    public function edit(string $productId)
    {
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name')->get();
        $sizes = Size::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();
        $statuses = StatusEnum::getStatusesString();

       $product = Product::select('id', 'name', 'brand_id', 'size_id', 'color_id', 'status')->with('categories:id,name')->find($productId);
        
        return view('admin.pages.product.form', compact('product', 'brands', 'colors', 'sizes', 'categories', 'statuses'));
    }

    public function update(ProductValidation $request, Product $product)
    {
        $product->update($request->validated());
        $product->categories()->sync($request->validated(['category_ids']));

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
}
