<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_billing_info extends Model
{
    protected $table = 'client_billing_info';
	

    public function user()
    {
        return $this->belongsTo("App\Models\User",'id');
    }
    
    public function get_notify()
    {
        # code...
    }

}
