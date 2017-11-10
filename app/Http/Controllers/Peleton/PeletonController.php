<?php

namespace App\Http\Controllers\Peleton;

use App\Domain\Group;
use App\Domain\Peleton;
use App\Http\Requests\PeletonRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeletonController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show-peleton')->only('index');
        $this->middleware('permission:create-peleton')->only('create', 'store');
        $this->middleware('permission:edit-peleton')->only('edit', 'update');
        $this->middleware('permission:delete-peleton')->only('destroy');
    }

    public function index()
    {
        return view('peleton.index')->with([
            'peletons' => Peleton::paginate(10)
        ]);
    }

    public function create()
    {
        return view('peleton.create')->with(['groups' => Group::whereNull('peleton_id')->get()]);
    }

    public function store(PeletonRequest $request)
    {
        $peleton = Peleton::create($request->all());

        if ($request->input('groups') != null){

            $groups = Group::whereIn('id', $request->input('groups'))->get();

            $peleton->groups()->saveMany($groups);

        }

        session()->flash('status', 'Peleton aangemaakt');

        return redirect()->route('peleton.index');
    }

    public function show(Peleton $peleton)
    {
        return view('peleton.show')->with([
            'peleton' => $peleton
        ]);
    }

    public function edit(Peleton $peleton)
    {
        $groups = Group::all()->where('peleton_id', null);

        $groupArray = [];
        foreach ($groups as $group) {
            $groupArray[] = $group;
        }

        return view('peleton.edit')->with([
            'peleton' => $peleton,
            'groups' => $groupArray
        ]);
    }

    public function update(Request $request, Peleton $peleton)
    {
        $this->validate($request, [
            'name' => 'required|u'
        ]);

        // remove all related groups
        Group::where('peleton_id', $peleton->id)->update(['peleton_id' => null]);

        // fetch groups and update relation
        $groups = Group::whereIn('id', $request->input('groups'))->get();
        $peleton->groups()->savemany($groups);

        session()->flash('status', 'Peleton bewerkt');

        return redirect()->route('peleton.show', ['id' => $peleton->id]);
    }

    public function destroy(Peleton $peleton)
    {
        // remove all related groups
        Group::where('peleton_id', $peleton->id)->update(['peleton_id' => null]);

        $peleton->delete();

        session()->flash('status', 'Peleton verwijderd');

        return redirect()->route('peleton.index');
    }
}
