<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::select('id','name')->paginate(10);

        return view('admin.pages.size.index', ['sizes' => $sizes]);
    }

    public function add()
    {
        return view('admin.pages.size.form');
    }

    public function store(SizeRequest $request)
    {
        Size::create($request->validated());

        return redirect()->route('size.index')->with('success', 'Size Added successfully.');
    }

    public function edit(string $sizeId)
    {
        $size = Size::select('id','name')->find($sizeId);

        return view('admin.pages.size.form', ['size' => $size]);
    }

    public function update(SizeRequest $request, Size $size)
    {
        $size->update($request->validated());
        
        return redirect()->route('size.index')->with('success', 'Size Update successfully.');
    } 
}
