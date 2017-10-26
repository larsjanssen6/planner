<?php

namespace App\Domain;

use Category;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
