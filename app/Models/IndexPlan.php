<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndexPlan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'index_plans';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name_line1', 'name_line2', 'status', 'url'];

    public function featured_plans() {
        return $this->hasMany('App\Models\PlanFeature', 'plan_id');
    }

}
