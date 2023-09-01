<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $data = Color::all();
        return view('admin.pages.color.color', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'color_name' => 'required|unique:colors,color_name|max:255',
        ]);
        Color::create([
            'color_name' => $request->color_name,
        ]);
        return redirect()->route('color')->with('success', $request->color_name . ' New Color successfully Added.');
    }

    public function edit(string $id)
    {
        $data = Color::find($id);
        return view('admin.pages.color.update', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'color_name' => 'required|unique:colors,color_name|max:255',
        ]);
        $data = Color::find($id);
        $data->color_name = $request->color_name;
        $data->save();
        return redirect()->route('color')->with('success', $request->color_name .' Color Name successfully Update.');
    }  
}
