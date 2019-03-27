<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $fillable = ['title', 'page', 'status'];

    public function details()
    {
        return $this->hasOne("App\Models\PlanFeatureDetail", "plan_feature_id");
    }
}
