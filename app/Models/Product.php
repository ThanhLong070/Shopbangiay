<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static select(string $string, string $string1, string $string2)
 * @method static findOrFail(int $id)
 * @property string image
 * @property mixed description
 * @property mixed cat_id
 * @property mixed name
 * @property mixed price
 * @property string slug
 * @property mixed id
 */
class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = [
    	'cat_id','name','description','image','price'
    ];

    public function product_img(){
        return $this->hasMany('App\Models\Product_images','product_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public  function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
    public function orm_category(){
       return $this->belongsTo(Category::class,'cat_id','id');
   }

}
