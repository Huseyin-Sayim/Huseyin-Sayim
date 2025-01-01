<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "slider";

    public function gallery()
    {
        return $this->hasOne(Gallery::class, "id", "slider_image");
    }
}
