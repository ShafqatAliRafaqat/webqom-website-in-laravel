<?php

namespace App\Models;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function client()
    {
        return $this->hasOne("App\Models\Client",'user_id','id');
    }
    public function client_billing()
    {
        return $this->hasOne("App\Models\Client_billing_info",'user_id','id');
    }

    public function domains(){
        return $this->hasMany(domain::class);
    }
    /*public function city()
    {
        return $this->belongsTo("App\Models\City");
    }
    public function state()
    {
        return $this->belongsTo("App\Models\State");
    }

    public function country()
    {
        return $this->belongsTo("App\Models\Country");
    }*/
    public function get_notify()
    {
        # code...
    }
}
