<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::withSum('items', 'quantity')->get();
        return response()->json([
            "data" => [
                "order" => OrderResource::collection($order)
            ]
        ]);
    }
}
