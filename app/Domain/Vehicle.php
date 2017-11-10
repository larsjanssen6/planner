<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * @var string
     */
    protected $table = 'vehicle';

    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'maintenance_interval',
        'maintenance_duration',
        'count',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
