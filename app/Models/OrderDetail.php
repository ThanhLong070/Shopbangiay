<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'order_id','product_id','total','quantity','price'
    ];

    public static function create(array $array)
    {
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    public function pro()
    {
        return $this->hasOne('App\Models\Product','cat_id','id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
