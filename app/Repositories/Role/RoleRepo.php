<?php

namespace App\Repositories\Role;

use App\Repositories\EloquentRepo;
use Spatie\Permission\Models\Role;

class RoleRepo extends EloquentRepo implements RoleRepoInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Role::class;
    }
}
