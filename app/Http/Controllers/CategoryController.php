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

        return redirect()->route('categories.index')->with('success', 'Added successfully ');
    }
    public function edit(string $catId)
    {
        $categories = Category::select('id', 'name', 'description', 'parent_id')->get();
        $category = Category::select('id', 'name', 'description', 'parent_id')->find($catId) ;
        
        return view('admin.pages.category.form', compact('category','categories'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category Updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->children()->delete();

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}