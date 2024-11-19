<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.home.index');
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
