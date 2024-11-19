<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('backend.category.index')->with($data);
    }
    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        //image upload...
        $imageUrl = imageUpload($request->file('image'), 'assets/upload/category-image/', 'C_');

        //Store category
        $save_category                  = new Category();
        $save_category->name            = $request->name;
        $save_category->description     = $request->description;
        $save_category->image           = $imageUrl;
        $save_category->status          = $request->status;
        $save_category->save();

        return back()->with('message', 'Category added successfully');
    }

    public function edit($id)
    {
        $data['category']  = Category::find($id);
        return view('backend.category.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $update_category  = Category::find($id);

        if ($request->file('image'))
        {
            $imageUrl = imageUpload($request->file('image'), 'assets/upload/category-image/', 'C_');
        }
        else
        {
           $imageUrl = $update_category->image;
        }

        $update_category->name            = $request->name;
        $update_category->description     = $request->description;
        $update_category->image           = $imageUrl;
        $update_category->status          = $request->status;
        $update_category->save();

        return redirect('/category')->with('message', 'Category update successfully');
    }

    public function destroy($id)
    {
        $delete_category  = Category::find($id);
        $delete_category->delete();

        return back()->with('message', 'Category delete successfully');
    }
}
