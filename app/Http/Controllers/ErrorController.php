<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Http\Request;

class ErrorController extends Controller
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

    public function isEmpty(Request $request)
    {
        $result = "
            'code' : '200', \n
            'error' : 'No Content', \n
            'path' : '" . $request->path() . "'\n";
        return json_encode($result);
    }
    //
}
