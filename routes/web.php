<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("index");
});

require __DIR__.'/auth.php';
