<?php

namespace App\Http\Controllers\Settings;

use Auth;
use App\Domain\User;
use App\Http\Requests\SettingsProfileRequest;
use App\Http\Controllers\Controller;

class SettingsUserController extends Controller
{
    /**
     * Show user profile page.
     *
     * @return $this
     */
    public function index()
    {
        return view('settings.profile.show')->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Update user profile.
     *
     * @param SettingsProfileRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingsProfileRequest $request, User $user)
    {
        $items = collect(['name', 'last_name', 'email', 'gender']);

        $user->update($request->only($items->toArray()));

        if (isset($request->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        session()->flash('status', 'Profiel geupdated');

        return back();
    }
}
