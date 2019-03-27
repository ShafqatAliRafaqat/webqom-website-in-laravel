<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client_registration_info';
	protected $primaryKey = 'client_id';
	public $incrementing = false;

     public function user()
    {
        return $this->belongsTo("App\Models\User",'id');
    }
    public function city()
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
    }
    public function get_notify()
    {
        # code...
    }

}
