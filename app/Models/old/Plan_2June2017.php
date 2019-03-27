<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DomainPricing;
use App\Models\PlanFeature;

class Plan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */


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

    public function services_free_domain() {
      return $this->hasOne('App\Models\ServicesFreeDomain', 'plan_id');
    }

    public function featured_plans() {
      return $this->hasMany('App\Models\PlanFeature', 'plan_id');
    }

    public function getTldsAttribute(){
      $tlds = unserialize($this->services_free_domain->tlds);
      return DomainPricing::whereIn('id', $tlds)->get()->implode('title', ', ');
    }


}
