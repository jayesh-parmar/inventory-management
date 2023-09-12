<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::paginate(10);
        return view('admin.pages.size.index', ['sizes' => $sizes]);
    }

    public function add()
    {
        return view('admin.pages.size.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sizes,name|max:255',
        ]);

        Size::create([
            'name' => $request->name,
        ]);

        return redirect()->route('size.index')->with('success', 'Size Added successfully.');
    }

    public function edit(string $sizeId)
    {
        $sizes = Size::find($sizeId);
        return view('admin.pages.size.update', ['size' => $sizes]);
    }

    public function update(Request $request, string $sizeId)
    {
        $request->validate([
            'name' => 'required|unique:sizes,name,'.$sizeId.'|max:255',
        ]);

        $sizes = Size::find($sizeId);
        $sizes->name = $request->name;
        $sizes->save();
        
        return redirect()->route('size.index')->with('success', 'Size Update successfully.');
    } 
}
