<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'photo_id',
        'is_active',
         'name', 
         'email',
         'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin(){
        if($this->role){
            return $this->role->name=='manager' && $this->is_active==1 ? true : false;
        }
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function getGravatarAttribute(){
        $hash=md5(strtolower(trim($this->attributes['email'])))."?r=R

&s=120";
        return "http://www.gravatar.com/avatar/$hash";
    }
}
