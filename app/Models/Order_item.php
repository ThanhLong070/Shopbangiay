<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    //
    protected $table = 'order_items';
    public $timestamps = false;
    protected $fillable = [
    	'product_id','order_id','quantity','price'
    ];
    public function pro()
    {
    	return $this->hasOne('App\Product','cat_id','id');
    }
}
