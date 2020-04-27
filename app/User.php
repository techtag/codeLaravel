<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'role_id','is_active','password','photo_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password']=bcrypt($password);
        }
    }
    /**
    * User -> Role Relationship
    */
    public function role(){
        return $this->belongsTo('App\Role');
    }
    /**
    * User -> Photos Relationship
    */
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin(){
        if($this->role->name=="administrator" && $this->is_active==1){
            return true;
        }
        return false;
    }
    /**
    * User has many post relationship
    */
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
