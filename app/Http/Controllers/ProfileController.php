<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view("profile.index", compact("user"));
    }
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "username" => [
                "required",
                Rule::unique("users", "username")->ignore(Auth::id(), "id")
            ],
        ]);
        Auth::user()->update([
            "name" => $request->get("name"),
            "username" => $request->get("username")
        ]);
        return $this->webUpdatedResponse();
    }

    public function password(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            "current_password" => "required",
            "password" => "required|min:8|confirmed",
        ]);
        if (Hash::check($request->get("current_password"), Auth::user()->password)){
            Auth::user()->update([
                "password" => Hash::make($request->get("password"))
            ]);
            return $this->webUpdatedResponse();
        }
        return $this->webErrorResponse("Nädogry häzirki parol girizdiňiz.");
    }
}
