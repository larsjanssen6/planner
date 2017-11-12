<?php

namespace App\Http\Controllers\Group;

use App\Domain\Group;
use App\Http\Requests\GroupRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Group\GroupRepoInterface;
use App\Repositories\Peleton\PeletonRepoInterface;

class GroupController extends Controller
{
    /**
     * @var GroupRepoInterface
     */
    protected $groupRepo;

    /**
     * @var PeletonRepoInterface
     */
    protected $peletonRepo;

    /**
     * GroupController constructor.
     * @param GroupRepoInterface $groupRepo
     * @param PeletonRepoInterface $peletonRepo
     */
    public function __construct(GroupRepoInterface $groupRepo, PeletonRepoInterface $peletonRepo)
    {
        $this->groupRepo = $groupRepo;
        $this->peletonRepo = $peletonRepo;

        $this->middleware('permission:show-group')->only('show');
        $this->middleware('permission:create-group')->only('create', 'store');
        $this->middleware('permission:edit-group')->only('edit', 'update');
        $this->middleware('permission:delete-group')->only('destroy');
    }

    /**
     * @return $this
     */
    public function index()
    {
        return view('group.index')->with(['groups' => $this->groupRepo->paginate()]);
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('group.create')->with(['peletons' => $this->peletonRepo->getAll()->pluck('name', 'id')]);
    }

    /**
     * @param GroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupRequest $request)
    {
        $this->groupRepo->create($request->all());

        session()->flash('status', 'Groep aangemaakt');

        return redirect()->route('group.index');
    }

    /**
     * @param $groupId
     * @return $this
     */
    public function show($groupId)
    {
        $group = $this->groupRepo->find($groupId);

        return view('group.show')->with(['group' => $group]);
    }

    /**
     * @param $groupId
     * @return $this
     */
    public function edit($groupId)
    {
        $group = $this->groupRepo->find($groupId);

        return view('group.edit')->with(['group' => $group, 'peletons' => $this->peletonRepo->getAll()->pluck('name', 'id')]);
    }

    /**
     * @param GroupRequest $request
     * @param $groupId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupRequest $request, $groupId)
    {
        $this->groupRepo->update($groupId, $request->all());

        session()->flash('status', 'Groep bewerkt');

        return redirect()->route('group.show', ['id' => $groupId]);
    }

    /**
     * @param $groupId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($groupId)
    {
        $this->groupRepo->delete($groupId);

        session()->flash('status', 'Groep verwijderd');

        return redirect()->route('group.index');
    }
}
