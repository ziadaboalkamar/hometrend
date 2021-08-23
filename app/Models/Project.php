<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected  $table = 'project';
    protected $fillable = [
        'id','name','filename','photo', 'date','address','description', 'designer_id','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function scopeSelection($query){

        return $query  ->select( 'id','name','filename','photo','date','address','description', 'designer_id','created_at','updated_at');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }
    public function project(){
        return  $this ->belongsTo('App\Models\Project','designer_id','id');
    }
}
