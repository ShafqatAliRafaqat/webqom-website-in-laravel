<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkDomain extends Model
{
    protected $table ='bulk_domain_pricing';
	
	protected $primaryKey = 'bdp_id';
	protected $guarded = ['id'];

    public function domain(){
        return $this->hasOne('App\Models\DomainPricing', 'domain_pricing_id');
    }
}
