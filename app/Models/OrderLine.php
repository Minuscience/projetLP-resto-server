<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $table = 'order_line';
    protected $fillable = [
        "idOrder",
        "idDish"
    ];

    protected $guarded = [];
}
