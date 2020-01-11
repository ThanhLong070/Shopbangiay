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
    public function detail(){
    	return $this->hasMany('App\Order_item','order_id','id');
    }
}
