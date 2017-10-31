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
     * A category belongsTo a education.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A vehicle belongsTo a education.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
