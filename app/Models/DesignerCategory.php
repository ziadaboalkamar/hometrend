<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignerCategory extends Model
{
    protected  $table = 'categories_designer';
    protected $fillable = [
        'id', 'name','active','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function scopeActive($query){

        return $query -> where('active',1);
    }

    public function scopeSelection($query){

        return $query->select('id','name','photo','active');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }

    public function getActive(){
        return $this ->active == 1 ? "مفعل" : "غير مفعل";
    }
    public function designer(){
        $this->hasMany('App\Models\Designer','category_prof_id','id') ;
    }


}
