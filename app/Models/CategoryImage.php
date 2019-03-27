<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected  $table="category_images";
    protected $fillable = [
        'category_id',
        'image',
        'banner',
        'image_alt_text',
        'image_start_date',
        'image_end_date',
        'pdf',
        'url',
        'sort_order',
        'created_at',
        'updated_at',
        'status'
    ];
}
