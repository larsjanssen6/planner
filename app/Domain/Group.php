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

    /**
     * Group has one Peleton
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function peleton()
    {
        return $this->hasOne(Peleton::class);
    }
}
