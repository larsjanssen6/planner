<?php

namespace App\Http\Controllers\Settings;

use App\Domain\Category;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;

class SettingsPermissionController extends Controller
{
    /**
     * Create a new controller instance. Only users with permission
     * edit-permission-settings have access to this controller.
     */
    public function __construct()
    {
        $this->middleware('permission:edit-permission-settings');
    }

    /**
     * Show permission settings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('settings.rights.permission.index')->with([
                'categories' => Category::where('type', 'permission_category')->with('permissions')->get(),
                'roles'      => Role::all(),
            ]
        );
    }

    /**
     * Add or revoke permissions to a role.
     *
     * @param PermissionRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request)
    {
        $role = Role::find($request->role);

        if ($role->hasPermissionTo($request->permission)) {
            $role->revokePermissionTo($request->permission);

            return back()->with('status', 'Permissie ingetrokken');
        }

        $role->givePermissionTo($request->permission);

        return back()->with('status', 'Permissie toegevoegd');
    }
}
