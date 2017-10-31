<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * @var string
     */
    protected $table = "group";

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
