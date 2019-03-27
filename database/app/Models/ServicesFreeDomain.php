<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class ServicesFreeDomain extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_free_domains';
	

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
    protected $fillable = ['name', 'status'];
     public function domain_tld()
    {
        return $this->hasOne("App\Models\DomainPricing",'user_id','id');
    }
	
	public static function getFreeDomains($PageName,$PlanID){
		$tbl = DB::table('service_free_domains as sfd');
		$tbl->where('sfd.page', $PageName);
		$tbl->where('sfd.plan_id', $PlanID); 
		return $tbl->first();
	}

    
}
