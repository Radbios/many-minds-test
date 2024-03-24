<?php

namespace App\Http\Controllers;

use App\Http\Services\LoggerService;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $orders = Order::with('items.product_supplier')->withSum('items', 'quantity')->paginate(8);
            return view("order.index", compact("orders"));
        }

        $orders = Order::with('items.product_supplier')->withSum('items', 'quantity')->whereHas('items', function($query) {
            $query->where('user_id', Auth::user()->id);
        })->paginate(8);
        return view("order.index", compact("orders"));
    }

    public function show($order_id)
    {
        $order = Order::findOrFail($order_id);

        $items = $order->items()->paginate(8);

        $total_price = 0;

        foreach ($items as $item) {
           $total_price += $item->quantity * $item->product_supplier->value_un;
        }

        return view('order.show', compact('order', 'items', 'total_price'));
    }

    public function finish_order($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->update([
            'status' => !$order->id,
            'shipping_date' => now()
        ]);

        LoggerService::log('info', "ORDER FINISH", "Pedido [" . $order->id . "] finalizado.");

        return redirect()->back()->with("success", "Pedido finalizado com sucesso!");
    }

}
