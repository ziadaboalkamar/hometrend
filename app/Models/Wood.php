<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wood extends Model
{
    protected  $table = 'wood';
    protected $fillable = [
        'id', 'name','created_at','updated_at'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function scopeSelection($query){

        return $query  ->select('id', 'name');
    }



    public function local(){
        $this->hasMany('App\Models\Local','wood_id','id') ;
    }

}
