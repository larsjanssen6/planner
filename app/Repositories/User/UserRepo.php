<?php

namespace App\Repositories\User;

use App\Domain\User;
use App\Repositories\EloquentRepo;

class UserRepo extends EloquentRepo implements UserRepoInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    /**
     * @param $id
     * @param array $request
     */
    public function update($id, array $request)
    {
        if (isset($request['password'])) {
            $request['password'] = bcrypt($request['password']);
        }

        parent::update($id, $request);
    }
}
