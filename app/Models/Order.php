<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $table = 'orders';
    protected $fillable = [
        'id', 'name','total','item_count','payment_method','phone', 'address','user_id','active','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function scopeActive($query){

        return $query -> where('active',1);
    }

    public function scopeSelection($query){

        return $query  ->select('id', 'name','item_count','payment_method','total','phone', 'address','user_id','active');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }

    public function getActive(){
        return $this ->active == 1 ? "مفعل" : "غير مفعل";
    }

    public function item(){
return $this -> belongsToMany('App\Models\Product', 'order_item','order_id','product_id');
    }
}
