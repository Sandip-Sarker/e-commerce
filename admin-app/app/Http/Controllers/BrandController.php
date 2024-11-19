<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $data['brands'] = Brand::all();
        return view('backend.brand.index')->with($data);
    }
    public function create()
    {
        return view('backend.brand.create');
    }

    public function store(Request $request)
    {
        //image upload...
        $imageUrl = imageUpload($request->file('image'), 'assets/upload/brand-image/', 'B_');

        //Store category
        $save_brand                  = new Brand();
        $save_brand->name            = $request->name;
        $save_brand->description     = $request->description;
        $save_brand->image           = $imageUrl;
        $save_brand->status          = $request->status;
        $save_brand->save();

        return back()->with('message', 'Brand added successfully');
    }

    public function edit($id)
    {
        $data['brand']  = Brand::find($id);
        return view('backend.brand.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $update_brand  = Brand::find($id);

        if ($request->file('image'))
        {
            $imageUrl = imageUpload($request->file('image'), 'assets/upload/brand-image/', 'B_');
        }
        else
        {
            $imageUrl = $update_brand->image;
        }

        $update_brand->name            = $request->name;
        $update_brand->description     = $request->description;
        $update_brand->image           = $imageUrl;
        $update_brand->status          = $request->status;
        $update_brand->save();

        return back()->with('message', 'Brand update successfully');
    }

    public function destroy($id)
    {
        $delete_brand  = Brand::find($id);
        $delete_brand->delete();

        return back()->with('message', 'Brand delete successfully');
    }
}
