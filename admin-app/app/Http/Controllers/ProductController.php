<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        return view('backend.product.index')->with($data);
    }
    public function create()
    {
        $data['categories']             = Category::all();
        $data['subCategories']          = SubCategory::all();
        $data['brands']                 = Brand::all();
        $data['units']                  = Unit::all();
        return view('backend.product.create')->with($data);
    }

    public function getSubCategoryByCategory()
    {
        $SubCategoryByCategory = SubCategory::where('category_id', $_GET['id'])->get();
        return response()->json($SubCategoryByCategory);
    }

    public function store(Request $request)
    {

        //validation
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'other_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image in the array
        ]);


        //image upload...
        $imageUrl = imageUpload($request->file('image'), 'assets/upload/product-image/', 'P_');

        //Store product
        $save_product                       = new Product();
        $save_product->category_id          = $request->category_id;
        $save_product->sub_category_id      = $request->sub_category_id;
        $save_product->brand_id             = $request->brand_id;
        $save_product->unit_id              = $request->unit_id;
        $save_product->name                 = $request->name;
        $save_product->code                 = $request->code;
        $save_product->short_description    = $request->short_description;
        $save_product->long_description     = $request->long_description;
        $save_product->regular_price        = $request->regular_price;
        $save_product->selling_price        = $request->selling_price;
        $save_product->stock_amount         = $request->stock_amount;
        $save_product->meta_title           = $request->meta_title;
        $save_product->meta_description     = $request->meta_description;
        $save_product->image                = $imageUrl;
        $save_product->status               = $request->status;
        $save_product->save();


        //Product other image save data
        if ($request->file('other_image'))
        {

            foreach ($request->file('other_image') as $key => $otherImage)
            {
                $imageUrl = imageUpload($otherImage, 'assets/upload/product-other-image/', 'Other_', $key);

              if ($imageUrl)
              {
                  $save_otherImage                  = new ProductImage();
                  $save_otherImage->product_id      = $save_product->id;
                  $save_otherImage->other_image     = $imageUrl;
                  $save_otherImage->save();
              }
            }
        }

        return back()->with('message', 'Product added successfully');
    }

    public function show($id)
    {
        $data['product']  = Product::find($id);

        return view('backend.product.show')->with($data);
    }

    public function edit($id)
    {
        $data['categories']             = Category::all();
        $data['subCategories']          = SubCategory::all();
        $data['brands']                 = Brand::all();
        $data['units']                  = Unit::all();
        $data['product']                = Product::find($id);
        return view('backend.product.edit')->with($data);
    }
    public function update(Request $request, $id)
    {

        $update_product = Product::find($id);

        // Handle main product image
        if ($request->file('image')) {
            $imageUrl = imageUpload($request->file('image'), 'assets/upload/product-image/', 'P_');
        } else {
            $imageUrl = $update_product->image;
        }

        // Update product details
        $update_product->category_id          = $request->category_id;
        $update_product->sub_category_id      = $request->sub_category_id;
        $update_product->brand_id             = $request->brand_id;
        $update_product->unit_id              = $request->unit_id;
        $update_product->name                 = $request->name;
        $update_product->code                 = $request->code;
        $update_product->short_description    = $request->short_description;
        $update_product->long_description     = $request->long_description;
        $update_product->regular_price        = $request->regular_price;
        $update_product->selling_price        = $request->selling_price;
        $update_product->stock_amount         = $request->stock_amount;
        $update_product->meta_title           = $request->meta_title;
        $update_product->meta_description     = $request->meta_description;
        $update_product->image                = $imageUrl;
        $update_product->status               = $request->status;
        $update_product->save();

        // Check if new "other images" are uploaded
        if ($request->file('other_image')) {
            // Find and delete old product images
            $productImages = ProductImage::where('product_id', $id)->get();
            foreach ($productImages as $productImage) {
                if (file_exists(public_path($productImage->other_image))) {
                    unlink(public_path($productImage->other_image));
                }
                $productImage->delete();
            }

            // Save new "other images"
            foreach ($request->file('other_image') as $key => $otherImage) {
                $imageUrl = imageUpload($otherImage, 'assets/upload/product-other-image/', 'Other_', $key);

                if ($imageUrl) {
                    $save_otherImage                  = new ProductImage();
                    $save_otherImage->product_id      = $update_product->id;
                    $save_otherImage->other_image     = $imageUrl;
                    $save_otherImage->save();
                }
            }
        }

        return back()->with('message', 'Product updated successfully');
    }


    public function destroy($id)
    {
//        $delete_unit  = Unit::find($id);
//        $delete_unit->delete();

        return back()->with('message', 'Product delete successfully');
    }
}
