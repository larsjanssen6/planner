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

    /**
     * Destroy role.
     *
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Role $role)
    {
        if (Auth::user()->hasRole($role->name)) {
            return response()->json([
                'status' => 'U kunt deze rol niet verwijder. Koppel uzelf eerst aan een andere rol.',
            ], 401);
        }

        $role->delete();

        return response()->json(['status' => 'Rol verwijderd.']);
    }
}
