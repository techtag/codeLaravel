<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads='/images/';
    protected $fillable=['file'];

    /*
    * Setting Accessor, it will set file path automatically, so in form you dont have to specify full path
    */
    public function getFileAttribute($photo){
    	return $this->uploads.$photo;
    }
}
