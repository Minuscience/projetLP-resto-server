<?php

namespace App\Http\Controllers;


use App\Models\Customer;
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

    public function getAll()
    {
        return response(Customer::all(), 200)
            ->header('Content-Type', 'application/json');
    }

    public function getOne($id)
    {
        return response(Customer::find($id))
            ->header('Content-Type', 'application/json');
    }

    public function update(Request $request, $id)
    {
        $values = json_decode($request->getContent(), true);
        $user = Customer::find($id);
        if(!isset($user))
            return "no user";
        $user->firstaname =$values["firstname"];
        $user->lastname =$values["lastname"];
        $user->email =$values["email"];
        $user->dateOfBirth = $values["dateOfBirth"];
        $user->extraNapkins = (bool)$values["extraNapkins"];
        $user->frequentRefill = (bool) $values["frequentRefill"];
        $user->save();
    }

}
