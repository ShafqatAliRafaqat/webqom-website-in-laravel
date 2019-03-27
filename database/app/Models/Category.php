<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function sub_categories()
    {
    	return $this->hasMany('App\Models\Category','parent');
    }
     public function category_images()
    {
    	return $this->hasMany('App\Models\CategoryImage','category_id');
    }
}
