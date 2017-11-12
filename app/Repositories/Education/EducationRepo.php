<?php

namespace App\Repositories\Education;

use App\Domain\Education;
use App\Repositories\EloquentRepo;

class EducationRepo extends EloquentRepo implements EducationRepoInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Education::class;
    }
}
