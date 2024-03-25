<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $order = [];
        if(Auth::user()->isAdmin()){
            $order = Order::withSum('items', 'quantity')->get();
        }
        else $order = Order::withSum('items', 'quantity')->whereHas('items', function($query){
            $query->where('user_id', Auth::user()->id);
        })->get();

        return response()->json([
            "data" => [
                "order" => OrderResource::collection($order)
            ]
        ]);
    }

    public function finished_order()
    {
        $order = [];
        if(Auth::user()->isAdmin()){
            $order = Order::withSum('items', 'quantity')->where("status", 0)->get();
        }
        else $order = Order::withSum('items', 'quantity')->where("status", 0)->whereHas('items', function($query){
            $query->where('user_id', Auth::user()->id);
        })->get();

        return response()->json([
            "data" => [
                "order" => OrderResource::collection($order)
            ]
        ]);
    }
}
