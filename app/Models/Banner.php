<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['banner_title','banner_image','banner_alt','banner_display_order','banner_status','banner_start_date','banner_end_date','banner_enlarge_image','banner_enlarge_pdf','banner_link'];
}
