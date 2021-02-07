<?php

namespace App\Http\Controllers;


use App\Models\Dish;
use http\Message\Body;
use Illuminate\Support\Facades\Response;
use Laravel\Lumen\Http\Request;
class DishController extends Controller
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

    //



    public function getAll()
    {
//        $dishes = Dish::all();
//        $result ="
//        'status' : 200,
//        'data' : " . $dishes ;

        var_dump(Dish::all());
//        return json_encode($result);

        return json_decode(Dish::all());
    }
}
