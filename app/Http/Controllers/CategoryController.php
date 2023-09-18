<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();

        return view('admin.pages.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::select('id', 'name', 'description', 'parent_id')->get();
        return view('admin.pages.category.form', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit($catId)
    {
        $categories = Category::select('id','name', 'description', 'parent_id')->get(); 
        $category = Category::find($catId);
        
        return view('admin.pages.category.form', ['category' => $category, 'categories' => $categories]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy($catId)
    {
        $category = Category::find($catId);
        $category->children()->delete();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
