<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Peleton extends Model
{
    /**
     * @var string
     */
    protected $table = "peleton";

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
