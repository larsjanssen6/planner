<?php

namespace App\Http\Controllers\Settings;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SettingsRoleController extends Controller
{
    /**
     * SettingsRoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:roles');
    }

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'max:15|required|unique:roles']);

        $role = Role::create($request->all());

        return response()->json($role);
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
