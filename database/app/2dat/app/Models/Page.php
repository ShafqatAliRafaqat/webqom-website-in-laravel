<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = ['name','content','publish','title','left_header','left_content','right_header','right_content'];
    public function cms()
    {
    	return $this->hasMany('App\Models\PageCms','page_id');
    }
}
