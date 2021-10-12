<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected  $table = 'payment_gateway';
    protected $fillable = [
        'id','user_id' ,'costumer_name','coustumer_email','coustomer_phone','expire_date','expire_time','payment_gateway','payments_id','status','value','cuurency','card_no','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function scopeSelection($query){

        return $query->select('id','user_id', 'costumer_name','coustumer_email','coustomer_phone','payment_gateway','payments_id','status','value','cuurency','card_no','created_at','updated_at');
    }
    public function product(){
        return $this->belongsToMany('App\Models\Product','order_item','payment_id','product_id');
    }
}
