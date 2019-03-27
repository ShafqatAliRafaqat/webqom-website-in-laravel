<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    protected $fillable = [
        'status',
        'title',
        'description',
        'post_date',
        'author',
        'author_thumbnail',
        'front_image',
        'content'
    ];

    protected $dates = [
        'post_date'
    ];

    protected $appends = [
        'frontend_date_format'
    ];


    public function getPostDateMonthInMiddleAttribute()
    {
        return $this->post_date->format('jS M Y');
    }

    public function getFrontendDateFormatAttribute()
    {
        return $this->post_date->format('d/m/Y');
    }

    public function scopePostDateByYear($query, $year)
    {
        return $query->where(DB::raw('YEAR(post_date)'),$year);
    }

    public function getPostDateYearAttribute()
    {
        return $this->post_date->format('Y');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
