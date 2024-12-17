<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = Category::orderByDesc("id")->get();
        return view("categories.index", compact("data"));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
        ]);

        Category::updateOrCreate([
            "name" => $request->get("name"),
        ]);
        return $this->webCreatedResponse();
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            "name" => "required",
        ]);
        $category->update([
            "name" => $request->get("name"),
        ]);
        return $this->webUpdatedResponse();
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return $this->webDeletedResponse();
    }
}
