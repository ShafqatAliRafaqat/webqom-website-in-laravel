<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeatureDetail extends Model
{
    protected $table = 'plan_feature_details';

    public function plan_feature()
    {
        return $this->belongsTo('App\Models\PlanFeature');
    }
}
