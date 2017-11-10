<?php

namespace App\Http\Controllers\Group;

use App\Domain\Group;
use App\Domain\Peleton;
use App\Http\Requests\GroupRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show-group')->only('index');
        $this->middleware('permission:create-group')->only('create', 'store');
        $this->middleware('permission:edit-group')->only('edit', 'update');
        $this->middleware('permission:delete-group')->only('destroy');
    }

    public function index()
    {
        return view('group.index')->with(['groups' => Group::paginate(10)]);
    }

    public function create()
    {
        return view('group.create')->with(['peletons' => Peleton::all()->pluck('name', 'id')]);
    }

    public function store(GroupRequest $request)
    {
        Group::create($request->all());

        session()->flash('status', 'Groep aangemaakt');

        return redirect()->route('group.index');
    }

    public function show(Group $group)
    {
        return view('group.show')->with(['group' => $group]);
    }

    public function edit(Group $group)
    {
        return view('group.edit')->with(['group' => $group, 'peletons' => Peleton::all()->pluck('name', 'id')]);
    }

    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $group->update($request->all());

        session()->flash('status', 'Groep bewerkt');

        return redirect()->route('group.show', ['id' => $group->id]);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        session()->flash('status', 'Groep verwijderd');

        return redirect()->route('group.index');
    }
}
