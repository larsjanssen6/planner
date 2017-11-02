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
     * A peleton belongsToMany groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'peleton_group');
    }
}
