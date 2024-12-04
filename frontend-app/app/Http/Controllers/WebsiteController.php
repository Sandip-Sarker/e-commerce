<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function index()
    {
        $data['adminUrl']       = $this->adminUrl();
        $data['products']       = Product::latest()->take(8)->get();
        $data['categories']     = Category::all();
        return view('website.home.index')->with($data);
    }

    public function aboutUs()
    {
        return view('website.home.about-us');
    }

    public function contactUs()
    {
        return view('website.home.contact-us');
    }

    public function allProduct($id)
    {
        $data['adminUrl']       = $this->adminUrl();
        $data['categories']     = Category::all();
        $data['products']       = Product::where('category_id', $id)->latest()->get();
        return view('website.home.product')->with($data);
    }

    public function SubCategoryWiseProduct($id)
    {
        $data['adminUrl']       = $this->adminUrl();
        $data['products']       = Product::where('sub_category_id', $id)->latest()->get();
        return view('website.home.product')->with($data);
    }

    public function productDetails($id)
    {
        $data['adminUrl']       = $this->adminUrl();
        $data['categories']     = Category::all();
        $data['product']        = Product::find($id);
        return view('website.home.product-details')->with($data);
    }
}
