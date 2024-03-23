<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product_supplier.product')->where("user_id", Auth()->user()->id)
                                                        ->where("order_id", null)->paginate(20);
        $total_price = 0;

        foreach ($cart as $item) {
           $total_price += $item->quantity * $item->product_supplier->value_un;
        }

        return view('cart.index', compact("cart", "total_price"));
    }

    public function store(Request $request)
    {

        $cart = Cart::with('product_supplier.product')->where("user_id", Auth()->user()->id)
                                                        ->where("order_id", null)->get();
        if($cart->count())
        {
            $total_price = 0;

            foreach ($cart as $item) {
               $total_price += $item->quantity * $item->product_supplier->value_un;
            }

            $order = Order::create([
                'total_price' => $total_price
            ]);
            $cart->map(function($item) use ($order){
                                $item->update([
                                    'order_id' => $order->id
                                ]);
                            });

            return redirect()->back()->with("sucess", "Pedido realizado com sucesso!");
        }
        return redirect()->back()->with("message", "Não há produtos no carrinho.");

    }

    public function destroy($cart_id)
    {
        Cart::findOrFail($cart_id)->delete();

        return redirect()->back()->with("success", "Item retidado do carrinho");
    }
}
