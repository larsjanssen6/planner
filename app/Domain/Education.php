<?php

namespace App;

use App\Domain\Category;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
