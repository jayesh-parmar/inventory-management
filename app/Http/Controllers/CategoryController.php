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
        if ($parentId) {
            $parentCategoryId = Category::find($parentId);

            if (!$parentCategoryId) {
                return redirect()->back()->with('error', 'Parent category not found.');  
            }
            return view('admin.pages.category.form', compact('parentCategoryId'));
        }
        else {
            return view('admin.pages.category.form');
        }
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category added successfully ');
    }
    public function edit(string $categoryId)
    {
        $category = Category::select('id', 'name', 'description', 'parent_id')->find($categoryId);
        
        return view('admin.pages.category.form', compact('category'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $categoryId)
    {
         $category = Category::find($categoryId);

        if ($category->children->isNotEmpty()) {
            return redirect()->route('categories.index')->with('error', 'This category cannot be deleted as there are one or more child categories attached.');
        }
        $category->children()->delete();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}