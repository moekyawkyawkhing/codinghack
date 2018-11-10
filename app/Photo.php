<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{	

    // protected $image="/image/";
    protected $fillable=[
    	'name',
    ];

    // public function getNameAttribute($photo){
    //     return url('/admin').$this->image.$photo;
    // }

}
