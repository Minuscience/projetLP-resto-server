<?php


namespace App\Models;


class Customer
{



     /* The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "firstname",
        "lastname",
        "email",
        "dateIfBirth",
        "extraNapkins",
        "frequentRefill",
        "updated_at"
    ];

    protected $guarded = [];

}
