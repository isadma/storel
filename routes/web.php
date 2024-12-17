<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("index");


    Route::prefix("profile")->name("profile.")->group(function () {
        Route::get("/", [\App\Http\Controllers\ProfileController::class, "index"])->name("index");
        Route::post("update", [\App\Http\Controllers\ProfileController::class, "update"])->name("update");
        Route::post("password/update", [\App\Http\Controllers\ProfileController::class, "password"])->name("password.update");
    });
});

require __DIR__.'/auth.php';
