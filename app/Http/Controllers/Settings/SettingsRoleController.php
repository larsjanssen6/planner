<?php

namespace App\Http\Controllers\Settings;

use Auth;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class SettingsRoleController extends Controller
{
    /**
     * Show user profile page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('settings.rights.role.index')->with([
            'roles' => Role::all()
        ]);
    }
}
