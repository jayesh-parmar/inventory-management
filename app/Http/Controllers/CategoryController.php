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

    public function add($parentId = null)
    {
        return view('admin.pages.category.form', compact('parentId'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }
    public function edit(string $categoryId)
    {
        $category = Category::select('id', 'name', 'description')->find($categoryId);
        
        return view('admin.pages.category.form', compact('category'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $categoryId)
    {
        $category = Category::where('id', $categoryId)->first();

        if ($category->children->isNotEmpty()) {
            return redirect()->route('categories.index')->with('error', 'This category cannot be deleted as there are one or more child categories attached.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}