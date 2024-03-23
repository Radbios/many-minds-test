<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopStoreRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $items = ProductSupplier::where("status", 1)->paginate(20);

        return view("shop.index", compact("items"));
    }

    public function store(ShopStoreRequest $request)
    {
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_supplier_id' => $request->product_supplier_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with("success", "Item adicionado no carrinho");
    }
}
