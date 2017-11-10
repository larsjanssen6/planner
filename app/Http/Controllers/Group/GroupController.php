<?php

namespace App\Http\Controllers\Group;

use App\Domain\Group;
use App\Domain\Peleton;
use App\Http\Requests\GroupRequest;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * GroupController constructor.
     */
    public function __construct()
    {
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
        return view('group.index')->with(['groups' => Group::paginate(10)]);
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('group.create')->with(['peletons' => Peleton::all()->pluck('name', 'id')]);
    }

    /**
     * @param GroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupRequest $request)
    {
        Group::create($request->all());

        session()->flash('status', 'Groep aangemaakt');

        return redirect()->route('group.index');
    }

    /**
     * @param Group $group
     * @return $this
     */
    public function show(Group $group)
    {
        return view('group.show')->with(['group' => $group]);
    }

    /**
     * @param Group $group
     * @return $this
     */
    public function edit(Group $group)
    {
        return view('group.edit')->with(['group' => $group, 'peletons' => Peleton::all()->pluck('name', 'id')]);
    }

    /**
     * @param GroupRequest $request
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->all());

        session()->flash('status', 'Groep bewerkt');

        return redirect()->route('group.show', ['id' => $group->id]);
    }

    /**
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group)
    {
        $group->delete();

        session()->flash('status', 'Groep verwijderd');

        return redirect()->route('group.index');
    }
}
