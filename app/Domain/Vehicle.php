<?php

namespace App\Domain;

use Category;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = "vehicle";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
