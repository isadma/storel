<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $brands = Brand::count();
        return view("index", compact("products", "categories", "brands"));
    }
}
