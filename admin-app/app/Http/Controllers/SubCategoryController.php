<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data['subCategories'] = SubCategory::all();
        return view('backend.sub-category.index')->with($data);
    }
    public function create()
    {
        $data['categories']= Category::all();
         return view('backend.sub-category.create')->with($data);
    }
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'name'              => 'required',
            'category_id'       => 'required',
            'status'            => 'required'
        ]);

        //image upload...
        $imageUrl = imageUpload($request->file('image'), 'assets/upload/sub-category-image/', 'C_');

        //Store category
        $save_subCategory                  = new SubCategory();
        $save_subCategory->category_id     = $request->category_id;
        $save_subCategory->name            = $request->name;
        $save_subCategory->description     = $request->description;
        $save_subCategory->image           = $imageUrl;
        $save_subCategory->status          = $request->status;
        $save_subCategory->save();

        return back()->with('message', 'Sub category added successfully');
    }

    public function edit($id)
    {
        $data['categories']     = Category::all();
        $data['subCategory']    = SubCategory::find($id);
        return view('backend.sub-category.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $update_subCategory  = SubCategory::find($id);

        if ($request->file('image'))
        {
            $imageUrl = imageUpload($request->file('image'), 'assets/upload/sub-category-image/', 'C_');
        }
        else
        {
            $imageUrl = $update_subCategory->image;
        }

        $update_subCategory->category_id     = $request->category_id;
        $update_subCategory->name            = $request->name;
        $update_subCategory->description     = $request->description;
        $update_subCategory->image           = $imageUrl;
        $update_subCategory->status          = $request->status;
        $update_subCategory->save();

        return back()->with('message', 'Sub category update successfully');
    }

    public function destroy($id)
    {
        $delete_subCategory  = SubCategory::find($id);
        $delete_subCategory->delete();

        return back()->with('message', 'Sub category delete successfully');
    }
}
