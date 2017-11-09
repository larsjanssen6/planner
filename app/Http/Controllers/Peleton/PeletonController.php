<?php

namespace App\Http\Controllers\Peleton;

use App\Domain\Group;
use App\Domain\Peleton;
use App\Http\Requests\PeletonRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeletonController extends Controller
{
    /**
     * Show all peletons.
     *
     * @return $this
     */
    public function index()
    {
        return view('peleton.index')->with([
            'peletons' => Peleton::paginate(10)
        ]);
    }

    /**
     * Show peleton create form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('peleton.create')->with(['groups' => Group::whereNull('peleton_id')->get()]);
    }

    /**
     * Store peleton.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Show peleton
     *
     * @param Peleton $peleton
     * @return $this
     */
    public function show(Peleton $peleton)
    {
        return view('peleton.show')->with([
            'peleton' => $peleton
        ]);
    }

    /**
     * Show edit peleton form.
     *
     * @param Peleton $peleton
     * @return $this
     */
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

    /**
     * Update peleton.
     *
     * @param Request $request
     * @param Peleton $peleton
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Peleton $peleton)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        // remove all related groups
        Group::where('peleton_id', $peleton->id)->update(['peleton_id' => null]);

        // fetch groups and update relation
        $groups = Group::whereIn('id', $request->input('groups'))->get();
        $peleton->groups()->savemany($groups);

        session()->flash('status', 'Peleton bewerkt');

        return redirect()->route('peleton.show', ['id' => $peleton->id]);
    }

    /**
     * Destroy Peleton.
     *
     * @param Peleton $peleton
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Peleton $peleton)
    {
        // remove all related groups
        Group::where('peleton_id', $peleton->id)->update(['peleton_id' => null]);

        $peleton->delete();

        session()->flash('status', 'Peleton verwijderd');

        return redirect()->route('peleton.index');
    }
}
