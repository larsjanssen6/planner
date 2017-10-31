<?php

namespace App\Http\Controllers\User;

use App\Domain\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show all users.
     *
     * @return $this
     */
    public function index()
    {
        return view('user.index')->with([
            'users' => User::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
