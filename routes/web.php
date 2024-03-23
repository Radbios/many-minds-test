<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    if(!Auth::check()) return view('login');
    return redirect()->back();
})->name("login");

Route::get('/register', function () {
    if(!Auth::check()) return view('register');
    return redirect()->back();
})->name("register");

Route::post("/auth", [AuthController::class, "authenticate"])->name("auth");

Route::middleware("auth")->group(function(){
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");

    Route::get('/', function () {
        return view('index');
    })->name("dashboard");

    Route::middleware("role:admin")->group(function(){
        Route::resource('product', ProductController::class);
        Route::resource('supplier', SupplierController::class);
    });


});
