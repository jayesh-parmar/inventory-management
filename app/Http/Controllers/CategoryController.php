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
}
