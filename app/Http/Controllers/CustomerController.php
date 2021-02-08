<?php

namespace App\Http\Controllers;


use App\Models\Dish;
use App\Models\User;
use Laravel\Lumen\Http\Request;

class CustomerController extends Controller
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

    public function getAll()
    {
        return null;
    }


    public function showProfile($email)
    {
        $user = User::where('email',$email) -> first();
        if (isset($user)){
            return response()->json([
                'status' => 200,
                'values' => Dish::all(),
            ]);
        }
        return response()->json([
            'status' => 200,
            'values' => Dish::all(),
        ]);
    }

    public function showProfiles(request $request)
    {
        $result = '';
        return json_encode($result);
    }
    //
}
