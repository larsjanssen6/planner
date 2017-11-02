<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'category';

    /**
     * @var array
     */
    protected $fillable  = ['name', 'type'];

    /**
     * A category belongs to many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'category_id');
    }

    /**
     * A category belongs to many educations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations()
    {
        return $this->belongsToMany(Permission::class, 'category_id');
    }
}
