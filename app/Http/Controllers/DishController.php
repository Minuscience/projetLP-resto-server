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
        return response()->json([
            'status' => 200,
            'values' => Dish::all()
        ]);
    }
}
