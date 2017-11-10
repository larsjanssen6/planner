<?php

namespace App\Http\Controllers\Peleton;

use App\Domain\Group;
use App\Domain\Peleton;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeletonRequest;

class PeletonController extends Controller
{
    /**
     * PeletonController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:show-peleton')->only('index');
        $this->middleware('permission:create-peleton')->only('create', 'store');
        $this->middleware('permission:edit-peleton')->only('edit', 'update');
        $this->middleware('permission:delete-peleton')->only('destroy');
    }

    /**
     * @return $this
     */
    public function index()
    {
        return view('peleton.index')->with([
            'peletons' => Peleton::paginate(10),
        ]);
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('peleton.create')->with(['groups' => Group::whereNull('peleton_id')->get()]);
    }

    /**
     * @param PeletonRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PeletonRequest $request)
    {
        $peleton = Peleton::create($request->all());

        if ($request->input('groups') != null) {
            $groups = Group::whereIn('id', $request->input('groups'))->get();

            $peleton->groups()->saveMany($groups);
        }

        session()->flash('status', 'Peleton aangemaakt');

        return redirect()->route('peleton.index');
    }

    /**
     * @param Peleton $peleton
     * @return $this
     */
    public function show(Peleton $peleton)
    {
        return view('peleton.show')->with([
            'peleton' => $peleton,
        ]);
    }

    /**
     * @param Peleton $peleton
     * @return $this
     */
    public function edit(Peleton $peleton)
    {
        $groups = Group::all()->where('peleton_id', null)->toArray();

//        dump($groups);
        //dump('<hr>');
//        $groupArray = [];
//        foreach ($groups as $group) {
//            $groupArray[] = $group;
//        }
        //dd($groupArray);
        return view('peleton.edit')->with([
            'peleton' => $peleton,
            'groups' => $groups,
        ]);
    }

    /**
     * @param PeletonRequest $request
     * @param Peleton $peleton
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PeletonRequest $request, Peleton $peleton)
    {
        $peleton->update($request->all());

        // remove all related groups
        Group::where('peleton_id', $peleton->id)->update(['peleton_id' => null]);

        // fetch groups and update relation
        $groups = Group::whereIn('id', $request->input('groups'))->get();
        $peleton->groups()->savemany($groups);

        session()->flash('status', 'Peleton bewerkt');

        return redirect()->route('peleton.show', ['id' => $peleton->id]);
    }

    /**
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
