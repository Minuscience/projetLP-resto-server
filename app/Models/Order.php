<?php


namespace App\Models;


class Order
{
    protected $fillable = [
        "dateOrder",
        "totalPrice",
        "idCustomer",
        "updated_at"
    ];
}
