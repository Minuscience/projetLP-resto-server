<?php


namespace App\Models;


class Dish
{
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
