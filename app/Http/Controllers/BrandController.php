<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $data = Brand::orderByDesc("id")->get();
        return view("brands.index", compact("data"));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
        ]);

        Brand::updateOrCreate([
            "name" => $request->get("name"),
        ]);
        return $this->webCreatedResponse();
    }

    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $request->validate([
            "name" => "required",
        ]);
        $brand->update([
            "name" => $request->get("name"),
        ]);
        return $this->webUpdatedResponse();
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();
        return $this->webDeletedResponse();
    }
}
