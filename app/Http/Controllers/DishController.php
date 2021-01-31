<?php

namespace App\Http\Controllers;


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

    public function showProfile($id)
    {
        $result ='';
        return json_encode($result);
    }
}
