<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *@property mixed product_id
 * @property  image
 * @property string|null image
 */
class Product_images extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'image','product_id'
    ];

     public  function product(){
        return $this->belongsTo('App\Model\Product');
    }

}
