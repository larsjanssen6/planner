<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable  = ['name', 'type'];
}
