<?php


namespace App\Models;


class OrderLine
{
    protected $fillable = [
        "idOrder",
        "idDish"
    ];

    protected $guarded = [];
}
