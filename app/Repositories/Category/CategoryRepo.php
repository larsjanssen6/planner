<?php

namespace App\Repositories\Category;

use App\Domain\Category;
use App\Repositories\EloquentRepo;

class CategoryRepo extends EloquentRepo implements CategoryRepoInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Category::class;
    }
}
