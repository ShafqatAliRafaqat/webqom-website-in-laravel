<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomainPricing extends Model
{
    protected $table='domain_pricing';

    public function listing()
    {
        return $this->hasOne('App\Models\DomainPricingList', 'domain_pricing_id');
    }

    public function bulk_pricing()
    {
        return $this->hasMany('App\Models\BulkDomain', 'domain_pricing_id');
    }
}
