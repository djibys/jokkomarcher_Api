<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasFactory , HasApiTokens;
    protected $table ="clients";

    protected $fillable = [
        "first_name" ,
        "last_name" ,
        "sexe" ,
        "adress" ,
        "phone_number" , 
        "email" , 
        "password"
    ];

    public $timestamps = false ;
}
