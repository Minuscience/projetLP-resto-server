<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Support\Facades\Date;
use Laravel\Lumen\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getLastOrder()
    {
        $lastOrder = Order::latest()->first();

        return response()->json([
            'status' => 200,
            'values' => $lastOrder
        ]);
    }

    public function addDOrder($userId)
    {
        $lastOrder = Order::where('current', '=', true);

        if (!isset($lastOrder)) {
            $order = new Order();

            $order->dateOrder = Date::now();
            $order->totalPrice = 0;
            $order->idCustomer = $userId;
            $order->current = true;
            $order->updated_at = Date::now();
            $order->save();

            $lastOrder = $order;
        }

        return response()->json([
            'status' => 200,
            'values' => $lastOrder
        ]);
    }

    //
}
