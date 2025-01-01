<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "gallery";

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_image');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, "service_image");
    }

    public function slider()
    {
        return $this->belongsTo(Slider::class, "slider_image");
    }
}
