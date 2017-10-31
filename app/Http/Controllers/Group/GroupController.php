<?php

namespace App\Http\Controllers\Group;

use App\Domain\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Show all groups.
     *
     * @return $this
     */
    public function index()
    {
        return view('group.index')->with(['groups' => Group::paginate(10)]);
    }

    /**
     * Show group create form.
     */
    public function create()
    {
        //Todo
    }

    /**
     * Store group.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        //Todo
    }

    /**
     * Show group.
     *
     * @param Group $group
     * @return $this
     */
    public function show(Group $group)
    {
        return view('group.show')->with(['group' => $group]);
    }

    /**
     * Show edit group form.
     *
     * @param Group $group
     * @return $this
     */
    public function edit(Group $group)
    {
        return view('group.edit')->with(['group' => $group]);
    }

    /**
     * Update group.
     *
     * @param Request $request
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $group->update($request->all());

        session()->flash('status', 'Groep bewerkt');

        return redirect()->route('group.show', ['id' => $group->id]);
    }

    /**
     * Destroy group.
     *
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
