<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customer';


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
