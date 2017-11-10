<?php

namespace App\Http\Controllers\User;

use App\Domain\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Notifications\Registration;

class UserController extends Controller
{
    /**
     * @return $this
     */
    public function index()
    {
        return view('user.index')->with([
            'users' => User::orderBy('id', 'DESC')->paginate(10),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * @param UserRequest $request
     * @return $this
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'last_name' => $request->last_name,
        ]);

        $user->notify(new Registration($user));

        session()->flash('status', 'Gebruiker aangemaakt');

        return view('user.index')->with([
            'users' => User::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
}
