<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Customer extends Model
{
    //
    protected $table = 'customers';

    protected $fillable = [
    	'name','email','address','phone','note'
    ]; 
    public function order(){
    	return $this->hasMany('App\Order','customer_id','id');
    }
     public function login(){
    	return $this->hasMany('App\Login','customer_id','id');
    }
}
