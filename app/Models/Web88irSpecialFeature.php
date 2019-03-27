<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Web88irSpecialFeature extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'web88ir_special_features';

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
    protected $fillable = ['title', 'description', 'icon', 'page','icon_image','status','heading','sub_heading','content','heading_status'];

    
}
