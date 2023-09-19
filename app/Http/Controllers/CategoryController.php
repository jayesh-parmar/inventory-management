<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function add()
    {
        $categories = Category::select('name', 'description', 'parent_id')->get();
        return view('admin.pages.category.form', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        
        Category::create($request->all());

        return redirect()->route('categories.create')->with('success', 'Added successfully ');
    }
}
