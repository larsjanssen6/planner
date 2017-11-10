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

    /**
     * A peleton hasMany groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
