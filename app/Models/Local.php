<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected  $table = 'local';
    protected $fillable = [
        'id', 'name','photo','gallery','phone','details', 'color','length','width','wood','user_id','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function scopeSelection($query){

        return $query  ->select('id','gallery', 'name','photo','phone','details', 'color','length','width','wood','user_id');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }
    public function wood(){

        return  $this ->belongsTo('App\Models\Wood','wood','id');
    }
    public function user(){
       return $this->belongsTo('App\User','user_id','id') ;
    }
}
