<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $data = Size::all();
        return view('admin.pages.size.size', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'size_name' => 'required|unique:sizes,size_name|max:255',
        ]);
        Size::create([
            'size_name' => $request->size_name,
        ]);
        return redirect()->route('size')->with('success', $request->size_name . ' New Size successfully Added.');
    }

    public function edit(string $id)
    {
        $data = Size::find($id);
        return view('admin.pages.size.update', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'size_name' => 'required|unique:sizes,size_name|max:255',
        ]);

        $data = Size::find($id);
        $data->size_name = $request->size_name;
        $data->save();
        return redirect()->route('size')->with('success', $request->size_name . ' Size successfully Update.');
    } 
}
