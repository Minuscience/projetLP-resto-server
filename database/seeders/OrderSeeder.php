<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        for ($i = 0; $i <= 10; $i++) {
            $idCustommer = [1, 2, 3, 4, 5, 6, 7];
            foreach ($idCustommer as $customer) {
                $dishList = [];
                $dishNumber = rand(1, 6);
                $timestamp = Date::now();
                $totalprice = 0;
                DB::table('order')->insert([
                    'dateOrder' => $timestamp,
                    'totalPrice' => 0,
                    'current' => true,
                    'idCustomer' => rand(0, 1),
                ]);

                $order = Order::where('dateOrder','=', $timestamp)->first();

                for ($j = 1; $j <= $dishNumber; $j++) {
                    $idDish = rand(0, 5);
                    DB::table('order_line')->insert([
                        'idOrder' => $order->id,
                        'idDish' => $idDish,
                    ]);
                    $totalprice += Dish::where('id','=', $i)->first()->price;
                }
                $order->totalPrice = $totalprice;
                $order->save();


            }

        }*/
        $dish = new Dish();

    }
}
