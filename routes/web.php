<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSupplierController;
use App\Http\Controllers\ShopController;
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
Route::post("/register", [AuthController::class, "register"])->name("create.user");

Route::middleware("auth")->group(function(){
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");

    Route::get('/', function () {
        return view('index');
    })->name("dashboard");

    Route::middleware("role:admin")->group(function(){
        Route::resource('product', ProductController::class);
        Route::get('product/{product}/create_supplier', [ProductController::class, 'create_supplier'])->name("product.create_supplier");
        Route::post('product/{product}/store_supplier', [ProductController::class, 'store_supplier'])->name("product.store_supplier");

        Route::resource('supplier', SupplierController::class);
        Route::get('supplier/{supplier}/create_product', [SupplierController::class, 'create_product'])->name("supplier.create_product");
        Route::post('supplier/{supplier}/store_product', [SupplierController::class, 'store_product'])->name("supplier.store_product");

        Route::resource('product_supplier', ProductSupplierController::class)->except('I
        index', 'store', 'show');

        Route::post('order/{order}/finish', [OrderController::class, 'finish_order'])->name("order.finish_order");
    });

    // --- ROUTES FOR ALL USERS ---
    Route::resource('shop', ShopController::class)->only('index', 'store');
    Route::resource('cart', CartController::class)->only('index', 'store', 'create', 'destroy');
    Route::delete('cart/{order}/remove_item_from_order', [CartController::class, 'remove_item_from_order'])->name("cart.remove_item_from_order");

    Route::resource('order', OrderController::class)->only('index', 'show');
});
