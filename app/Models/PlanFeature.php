<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $fillable = ['title', 'page', 'status', 'plan_id'];
	protected $table = 'plan_features';
    public function details()
    {
        return $this->hasOne("App\Models\PlanFeatureDetail", "plan_feature_id");
    }
}
