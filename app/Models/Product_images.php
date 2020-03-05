<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *@property mixed product_id

 * @property string|null image
 * @method static findOrFail($product_id)
 */
class Product_images extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'image','product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

}
