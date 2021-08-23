<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected  $table = 'order_item';
    protected $fillable = [
        'id', 'order_id','product_id','price','quantity','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

}
