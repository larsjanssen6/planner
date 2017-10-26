<?php

namespace App\Http\Controllers\Settings;

use Auth;
use App\Http\Controllers\Controller;

class SettingsUserController extends Controller
{
    public function index()
    {
        return view('settings.profile.show')->with([
            'user' => Auth::user()
        ]);
    }
}
