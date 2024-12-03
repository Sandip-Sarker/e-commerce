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
        $data['categories']     = Category::all();
        $data['products']       = Product::latest()->take(8)->get();
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

    public function allProduct()
    {
        return view('website.home.product');
    }

    public function productDetails()
    {
        return view('website.home.product-details');
    }
}
