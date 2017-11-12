<?php

namespace App\Repositories\Group;

use App\Domain\Group;
use App\Repositories\EloquentRepo;

class GroupRepo extends EloquentRepo implements GroupRepoInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Group::class;
    }
}
