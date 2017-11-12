<?php

namespace App\Http\Controllers\Settings;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepoInterface;

class SettingsRoleController extends Controller
{
    /**
     * @var mixed
     */
    protected $roleRepo;

    /**
     * SettingsRoleController constructor.
     * @param RoleRepoInterface $roleRepo
     */
    public function __construct(RoleRepoInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;

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
            'roles' => $this->roleRepo->getAll(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'max:15|required|unique:roles']);

        $role = $this->roleRepo->create($request->all());

        return response()->json($role);
    }

    /**
     * @param $roleId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($roleId)
    {
        $role = $this->roleRepo->find($roleId);

        if (Auth::user()->hasRole($role->name)) {
            return response()->json([
                'status' => 'U kunt deze rol niet verwijder. Koppel uzelf eerst aan een andere rol.',
            ], 401);
        }

        $this->roleRepo->delete($roleId);

        return response()->json(['status' => 'Rol verwijderd.']);
    }
}
