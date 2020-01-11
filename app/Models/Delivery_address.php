<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery_address extends Model
{
    //
    protected $table = 'delivery_addresses';

    protected $fillable = [
    	'id','forename','surname','add1','add2','add3','post_code','phone','email','created_at','updated_at'
    ];
}
