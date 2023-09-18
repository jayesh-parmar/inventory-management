<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::paginate(10);
    
        return view('admin.pages.color.index', ['colors' => $color]);
    }

    public function addColor()
    {
        return view('admin.pages.color.form');
    }

    public function store(ColorRequest $request)
    {
        Color::create($request->validated());

        return redirect()->route('color.index')->with('success',  'New Color Added successfully ');
    }

    public function edit(string $colorId)
    {
        $color = Color::find($colorId);

        return view('admin.pages.color.form', compact('color') );
    }

    public function update(ColorRequest $request, Color $color)
    {
        $color->update($request->validated());
        
        return redirect()->route('color.index')->with('success', 'Color Update successfully.');
    }  
}