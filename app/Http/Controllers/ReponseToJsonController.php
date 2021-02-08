<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Http\Request;

class ReponseToJsonController extends Controller
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

    public function responseToJson($value, $valueName = null)
    {
        if(!isset($valueName)){
            $valueName = values;
        }
        $response =  response()->json([
            'status' => 200,
            $valueName => $value,
        ]);
        return $response;
    }
    //
}
