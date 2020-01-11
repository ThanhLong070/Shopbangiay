<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed category_parent
 * @property mixed name
 * @property string slug
 * @property mixed description
 * @property string image
 * @method static orderBy(string $string, string $string1)
 * @method static select(string $string, string $string1, string $string2)
 * @method static findOrFail(int $id)
 */
class Category extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = [
    	'category_parent','name','description','image'
    ];
   public function orm_category(){
       return $this->hasMany(Category::class,'category_parent','id')->where('category_parent',1);
   } 
   public function orm_product(){
       return $this->hasMany(Product::class,'cat_id','id');
   }
   

}
