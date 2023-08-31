<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $data = Brand::all();
        return view('admin.pages.brands.brands', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
        $data= new Brand;
        $data->brand_name =Str::ucfirst($request->brand_name);
        $data->save();
        return redirect()->route('brands')->with('success', $request->brand_name . 'New Brand successfully Added.');
    }
   
    public function edit(string $id)
    {
        $data= Brand::find($id);
        return view('admin.pages.brands.update',['data'=>$data]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
    
        $data= Brand::find($id);
        $data->brand_name=Str::ucfirst($request->brand_name);
        $data->save();

        return redirect('brands')->with('success', $request->brand_name.' Brand Name successfully Update.');
    }  
}
