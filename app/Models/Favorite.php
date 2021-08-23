<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected  $table = 'favorite';
    protected $fillable = [
        'id', 'product_id','user_id','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function scopeSelection($query){

        return $query->select('id', 'product_id','user_id','created_at','updated_at');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }
    public function product(){
      return  $this ->belongsTo('App\Models\Product','product_id');
    }

}
