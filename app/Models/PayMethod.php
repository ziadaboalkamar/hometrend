<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayMethod extends Model
{
    protected  $table = 'pay_method';
    protected $fillable = [
        'id', 'order_id','card_number','expire_date','cvv','card_holder', 'paymethod','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function scopeSelection($query){

        return $query  ->select('id', 'order_id','card_number','expire_date','cvv','card_holder', 'paymethod','created_at','updated_at');
    }

}
