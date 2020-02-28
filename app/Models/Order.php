<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Order extends Model
{
    //
     protected $table = 'orders';

    protected $fillable = [
        'customer_id','payment','total','note','status'
    ];



//    public static function whereBetween(string $string, array $array)
//    {
//    }
//
//
//
//    public static function count()
//    {
//    }



    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
    public function detail(){
    	return $this->hasMany('App\Models\OrderDetail','order_id','id');
    }


}
