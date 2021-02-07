<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $table = 'dish';

    protected $fillable = [
        "name",
        "description",
        "price",
        "calories",
        "proteins",
        "carbs",
        "imageURL",
        "updated_at"
    ];

    protected $guarded = [];
}
