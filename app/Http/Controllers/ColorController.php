<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::paginate(10);
        return view('admin.pages.color.color', ['colors' => $color]);
    }
    public function addColor()
    {
        return view('admin.pages.color.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'color_name' => 'required|unique:colors,color_name|max:255',
        ]);
        Color::create([
            'color_name' => $request->color_name,
        ]);
        return redirect()->route('color.index')->with('success',  ' New Color Added successfully ');
    }

    public function edit(string $colorId)
    {
        $color = Color::find($colorId);
        return view('admin.pages.color.update', ['color' => $color]);
    }

    public function update(Request $request, string $colorId)
    {
        $request->validate([
            'color_name' => 'required|unique:colors,color_name|max:255',
        ]);
        $color = Color::find($colorId);
        $color->color_name = $request->color_name;
        $color->save();
        return redirect()->route('color.index')->with('success', ' Color Update successfully.');
    }  
}