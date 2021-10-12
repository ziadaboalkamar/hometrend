<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected  $table = 'products';
    protected $fillable = [
        'id', 'name','photo','details', 'price','size','status','gallery','active','category_id','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function scopeActive($query){

        return $query -> where('active',1);
    }

    public function scopeSelection($query){

        return $query  ->select( 'id', 'name','photo','gallery','details', 'price','size','status','active','category_id');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }

    public function getActive(){
        return $this ->active == 1 ? "مفعل" : "غير مفعل";
    }
    public function getStatus(){
        return $this ->status == 1 ? "Available" : "Not Available";
    }
    public function category(){

        return  $this ->belongsTo('App\Models\Category','category_id','id');
    }
    public function payment(){
        return $this->belongsToMany('App\Models\PaymentGateway', 'order_item','payment_id','product_id');
    }

}
