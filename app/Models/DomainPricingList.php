<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomainPricingList extends Model
{
    protected $fillable = ['status', 'domain_pricing_id', 'type', 'country', 'tld', 'epp_code', 'addons', 'pricing'];

    public function domain(){
        return $this->hasOne('App\Models\DomainPricing', 'domain_pricing_id');
    }
}
