<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * @var string
     */
    protected $table = "vehicle";

    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'maintenance_interval',
        'maintenance_duration',
    ];

    /**
     * Vehicle has one Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
