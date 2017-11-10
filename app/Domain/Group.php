<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * @var string
     */
    protected $table = 'group';

    /**
     * @var array
     */
    protected $fillable = ['name', 'peleton_id'];

    /**
     * Group has one Peleton.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function peleton()
    {
        return $this->belongsTo(Peleton::class);
    }
}
