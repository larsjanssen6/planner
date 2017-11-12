<?php

namespace App\Http\Controllers\Settings;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Repositories\Role\RoleRepoInterface;
use App\Repositories\Category\CategoryRepoInterface;

class SettingsPermissionController extends Controller
{
    /**
     * @var RoleRepoInterface
     */
    protected $roleRepo;

    /**
     * @var CategoryRepoInterface
     */
    protected $categoryRepo;

    /**
     * Create a new controller instance. Only users with permission
     * edit-permission-settings have access to this controller.
     * @param RoleRepoInterface $roleRepo
     * @param CategoryRepoInterface $categoryRepo
     */
    public function __construct(RoleRepoInterface $roleRepo, CategoryRepoInterface $categoryRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->categoryRepo = $categoryRepo;

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
                'categories' => $this->categoryRepo->findAll('type', 'permission_category', ['permissions']),
                'roles'      => $this->roleRepo->getAll(),
            ]
        );

        //Category::where('type', 'permission_category')
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
