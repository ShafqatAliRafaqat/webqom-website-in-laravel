<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = ['name','content','content2','publish','title','left_header','left_content','right_header','right_content','temp','duplicate_from'];
    public function cms()
    {
    	return $this->hasMany('App\Models\PageCms','page_id');
    }
}
