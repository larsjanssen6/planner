<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * @var string
     */
    protected $table = 'education';
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
