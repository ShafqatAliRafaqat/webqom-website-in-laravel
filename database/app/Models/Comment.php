<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'article_id',
        'message',
        'seen',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function getCreatedAtFrontedFormatAttribute()
    {
        return $this->created_at->format('jS M Y');
    }
}
