<?php

namespace App\Http\Controllers\Settings;

use Auth;
use App\Repositories\User\UserRepoInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsProfileRequest;

class SettingsUserController extends Controller
{
    /**
     * @var UserRepoInterface
     */
    protected $userRepo;

    /**
     * SettingsUserController constructor.
     * @param UserRepoInterface $userRepo
     */
    public function __construct(UserRepoInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Show user profile page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('settings.profile.show')->with([
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param SettingsProfileRequest $request
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingsProfileRequest $request, $userId)
    {
        $items = collect(['name', 'last_name', 'email']);

        $this->userRepo->update($userId, $request->only($items->toArray()));

        session()->flash('status', 'Profiel geupdated');

        return back();
    }
}
