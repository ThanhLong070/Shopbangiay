<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function  product()
    {
        return $this->hasMany('App\Models\Product','brand_id','id');
    }
    public function orm_product(){
        return $this->belongsTo(Product::class,'brand_id','id');
    }
}
