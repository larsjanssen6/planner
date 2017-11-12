<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRequest;
use App\Notifications\Registration;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepoInterface;

class UserController extends Controller
{
    /**
     * @var UserRepoInterface
     */
    protected $userRepo;

    public function __construct(UserRepoInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @return $this
     */
    public function index()
    {
        return view('user.index')->with([
            'users' => $this->userRepo->paginate(),
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
        $request['password'] = bcrypt($request->password);

        $user = $this->userRepo->create($request->all());

        $user->notify(new Registration($user));

        session()->flash('status', 'Gebruiker aangemaakt');

        return view('user.index')->with([
            'users' => $this->userRepo->paginate(),
        ]);
    }
}
