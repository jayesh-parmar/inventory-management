<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::paginate(10);
        return view('admin.pages.size.index', ['sizes' => $size]);
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

        return redirect()->route('size.index')->with('success', 'New Size Added successfully .');
    }

    public function edit(string $sizeId)
    {
        $size = Size::find($sizeId);
        return view('admin.pages.size.update', ['size' => $size]);
    }

    public function update(Request $request, string $sizeId)
    {
        $request->validate([
            'name' => 'required|unique:sizes,name,'.$sizeId.'|max:255',
        ]);

        $size = Size::find($sizeId);
        $size->name = $request->name;
        $size->save();
        
        return redirect()->route('size.index')->with('success', 'Size Update successfully.');
    } 
}
