<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        "dateOrder",
        "totalPrice",
        "idCustomer",
        "current",
        "updated_at"
    ];

    protected $guarded = [];
}
