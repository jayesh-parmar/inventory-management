<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::all();
        return view('admin.pages.brands.brands', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
        $capitalizedString = ucfirst($request->brand_name);
        $data= new Brand;
        $data->brand_name = $capitalizedString;
        $data->save();
        return redirect()->route('brands')->with('success', $request->brand_name . 'New Brand successfully Added.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Brand::find($id);
        return view('admin.pages.brands.update',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
        $capitalizedString = ucfirst($request->brand_name);
        $data= Brand::find($id);
        $data->brand_name=$capitalizedString;
        $data->save();

        return redirect('brands')->with('success', $request->brand_name.' Brand Name successfully Update.');
    }

    
}
