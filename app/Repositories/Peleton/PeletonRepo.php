<?php

namespace App\Repositories\Peleton;

use App\Domain\Peleton;
use App\Repositories\EloquentRepo;

class PeletonRepo extends EloquentRepo implements PeletonRepoInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Peleton::class;
    }
}
