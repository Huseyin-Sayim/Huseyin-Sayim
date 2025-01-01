<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blog";

    public function gallery()
    {
        return $this->hasOne(Gallery::class, 'id', 'blog_image');
    }
}
