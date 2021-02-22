<?php

namespace App\Http\Controllers;


use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderLine;
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

    public function last($userId)
    {
        $lastOrder = Order::where('idCustomer', $userId);

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

    public function addOrder(Request $request)
    {
        $value = json_decode($request);

        return $value;
        $customer = $value->idCustomer;
        $dishesIds = explode(" ,", idDishes);

        $totalPrice = 0;
        $lastOrderId = null;

        foreach ($dishesIds as $id) {
            $current = Dish::where('id', '=', $id);
            $totalPrice += $current->price;
        }

        $currentOrder = new Order();
        $currentOrder->current = true;

        $currentOrderId = 0;
        $LastOrder = Order::where('idCustomer', '=', $customer)->last;

        if (isset($lastOrder)) {
            $lastOrder->current = false;
            $lastOrder->save;
            $currentOrderId = $lastOrder->id + 1;
        }
        $currentOrder->id = $currentOrderId;
        $currentOrder->dateOrder = new \DateTime();
        $currentOrder->totalPrice = $this->totalPrice($dishesIds);
        $currentOrder->idCustomer = $customer;
        $currentOrder->current = true;
        $currentOrder->save();

        $this->addOrderLine($currentOrderId,$dishesIds);

        return response($currentOrder)
            ->header('Content-Type', 'application/json');
    }

    public function totalPrice($dishesId)
    {
        $total = null;
        foreach ($dishesId as $idDishes) {
            $dish = Dish::where("id", "=", $idDishes);
            if (isset($dish))
                $total += $dish->price;
        }
        return $total;

    }

    public function addOrderLine($idOrder, $dishesId)
    {
        foreach ($dishesId as $idDishes) {
            $line = new OrderLine();
            $line->idOrder = $idOrder;
            $line->idDish = $idDishes;
        }

    }
    //
}
