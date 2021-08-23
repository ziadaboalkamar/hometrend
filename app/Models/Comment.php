<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected  $table = 'comments';
    protected $fillable = [
        'id','product_id','user_id','designer_id','message','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function scopeSelection($query){

        return $query->select( 'id','product_id','user_id','designer_id','message','created_at','updated_at');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
