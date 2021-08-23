<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{

    protected  $table = 'designers';
    protected $fillable = [
        'id', 'phone', 'about_us','price_hour','graduated','address','category_prof_id','website','created_at','updated_at'
    ];

    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $cast = ['category_prof_id' => 'array']; // the property is $cast no $cat


    public function scopeActive($query){

        return $query -> where('active',1);
    }

    public function scopeSelection($query){

        return $query  ->select('id', 'phone','about_us','price_hour','graduated','address','category_prof_id','website','created_at','updated_at');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }

    public function getActive(){
        return $this ->active == 1 ? "مفعل" : "غير مفعل";
    }
    public function category(){

        return  $this ->belongsTo('App\Models\DesignerCategory','category_prof_id','id');
    }

    public function users(){

        return  $this ->hasMany('App\User','designers_id','id');
    }
    public function project(){
        return  $this ->hasMany('App\Models\Project','designer_id','id');
    }
}
