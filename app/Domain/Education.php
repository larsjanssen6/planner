<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
