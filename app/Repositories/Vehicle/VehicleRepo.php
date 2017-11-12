<?php

namespace App\Repositories\Vehicle;

use App\Domain\Vehicle;
use App\Repositories\EloquentRepo;

class VehicleRepo extends EloquentRepo implements VehicleRepoInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Vehicle::class;
    }
}
