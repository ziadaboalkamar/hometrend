<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','active' , 'photo','designers_id','address','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeActive($query){

        return $query -> where('active',1);
    }

    public function scopeSelection($query){

        return $query  ->select( 'id', 'name','photo','email','active','designers_id','address','phone');
    }


    public function getPhotoAttribute($val){
        return ($val !== null)? asset('assets/'.$val) : "";
    }

    public function getActive(){
        return $this ->active == 1 ? "مفعل" : "غير مفعل";
    }
    public function getStatus(){
        return $this ->active == 1 ? "Available" : "Not Available";
    }
    public function designer(){

        return  $this ->belongsTo('App\Models\Designer','designers_id','id');
    }

    public function local(){
      return  $this->hasMany('App\Models\Local','user_id','id') ;
    }
}
