<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::orderByDesc("id")->get();
        $categories = Category::orderBy("name")->get();
        $brands = Brand::orderBy("name")->get();
        return view("products.index", compact("data", "categories", "brands"));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "category_id" => "required",
            "brand_id" => "required",
            "name" => "required",
            "price1" => "nullable",
            "price2" => "nullable",
            "note" => "nullable",
        ]);

        Product::updateOrCreate([
            "category_id" => $request->get("category_id"),
            "brand_id" => $request->get("brand_id"),
            "name" => $request->get("name"),
            "price1" => $request->get("price1"),
            "price2" => $request->get("price2"),
            "note" => $request->get("note"),
        ]);
        return $this->webCreatedResponse();
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            "category_id" => "required",
            "brand_id" => "required",
            "name" => "required",
            "price1" => "nullable",
            "price2" => "nullable",
            "note" => "nullable",
        ]);
        $product->update([
            "category_id" => $request->get("category_id"),
            "brand_id" => $request->get("brand_id"),
            "name" => $request->get("name"),
            "price1" => $request->get("price1"),
            "price2" => $request->get("price2"),
            "note" => $request->get("note"),
        ]);
        return $this->webUpdatedResponse();
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return $this->webDeletedResponse();
    }
}
