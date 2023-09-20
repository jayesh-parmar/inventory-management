<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function add()
    {
        $categories = Category::select('id', 'name', 'description', 'parent_id')->get();
        
        return view('admin.pages.category.form', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category added successfully ');
    }
    public function edit(string $categoryId)
    {
        $categories = Category::select('id', 'name', 'description')->get();
        $category = Category::select('id', 'name', 'description', 'parent_id')->find($categoryId);
        
        return view('admin.pages.category.form', compact('category','categories'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $categoryId)
    {
         $category = Category::select('id')->find($categoryId);

        if ($category->children->isNotEmpty()) {
            return redirect()->route('categories.index')->with('error', 'Cannot delete category with child categories.');
        }
        $category->children()->delete();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}