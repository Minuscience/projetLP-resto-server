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
        $values = json_decode($request->getContent(), true);
//        $values = $request->getContent();


        $customer =  $values['idCustomer'];
        $dishesIds = explode(", ", $values['idDishes']);

//        return response($values)
//            ->header('Content-Type', 'application/json');

        $totalPrice = 0;
        foreach ($dishesIds as $id) {
            $current = Dish::find((int)$id);
            $totalPrice += $current->price;
        }


        $now = new \DateTime();

        $currentOrder = new Order();

        $currentOrder->dateOrder = $now;
        $currentOrder->current = true;

        $LastOrder = Order::where('idCustomer', '=', $customer)->latest();

        if (isset($lastOrder)) {
            $lastOrder->current = false;
            $lastOrder->save;
        }

        $currentOrder->totalPrice = $this->totalPrice($dishesIds);
        $currentOrder->idCustomer = $customer;
        $currentOrder->current = true;
        $currentOrder->save();

        $currentOrder = Order::where('dateOrder', $now)->first();
        $currentOrderId = $currentOrder->id;
        $this->addOrderLine($currentOrderId, $dishesIds);

        return response("your order is save")
            ->header('Content-Type', 'application/json');
    }

    public function totalPrice($dishesId)
    {
        $total = 0;
        foreach ($dishesId as $id) {
            $dish = Dish::find($id);
            if (isset($dish))
                $total += $dish->price;
        }
        return $total;

    }

    public function addOrderLine($idOrder, $dishesId)
    {
        foreach ($dishesId as $id) {
            $line = new OrderLine();
            $line->idOrder = $idOrder;
            $line->idDish = $id;
            $line->save();
        }

    }
    //
}
