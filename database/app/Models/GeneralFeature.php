<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralFeature extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_features';

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
    //protected $fillable = ['name_line1', 'name_line2', 'status', 'url'];

    
}
