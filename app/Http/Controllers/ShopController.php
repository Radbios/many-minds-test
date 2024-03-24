<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopStoreRequest;
use App\Http\Services\LoggerService;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $items = ProductSupplier::where("status", 1)->where("inventory", '<>', 0)->paginate(15);

        return view("shop.index", compact("items"));
    }

    public function store(ShopStoreRequest $request)
    {
        $cart = auth()->user()->cart()->where("product_supplier_id", $request->product_supplier_id)->first();

        if($cart)
        {
            $sum_quantity = $cart->quantity + $request->quantity;
            $cart->update([
                'quantity' => $sum_quantity > $cart->product_supplier->inventory ? $cart->product_supplier->inventory : $sum_quantity,
            ]);

            LoggerService::log('info', "CART CREATE", "Item [" . $cart->id . "] adicionado ao carrinho.");
        }
        else {
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'product_supplier_id' => $request->product_supplier_id,
                'quantity' => $request->quantity,
            ]);

            LoggerService::log('info', "CART CREATE", "Item [" . $cart->id . "] adicionado ao carrinho.");
        }

        return redirect()->back()->with("success", "Item adicionado no carrinho");
    }
}
