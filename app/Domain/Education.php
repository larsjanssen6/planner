<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'vehicle_id',
        'name',
        'duration',
        'required_students',
        'required_instructors',
    ];

    /**
     * Education has one category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    /**
     * Education has many Vehicles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
