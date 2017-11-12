<?php

namespace App\Http\Controllers\Peleton;

use App\Domain\Group;
use App\Domain\Peleton;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeletonRequest;
use App\Repositories\Peleton\PeletonRepoInterface;

class PeletonController extends Controller
{
    protected $peletonRepo;

    /**
     * PeletonController constructor.
     * @param PeletonRepoInterface $peletonRepo
     */
    public function __construct(PeletonRepoInterface $peletonRepo)
    {
        $this->peletonRepo = $peletonRepo;

        $this->middleware('permission:show-peleton')->only('show');
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
            'peletons' => $this->peletonRepo->getAll(),
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
        $peleton = $this->peletonRepo->create($request->all());

        if ($request->input('groups') != null) {
            $groups = Group::whereIn('id', $request->input('groups'))->get();

            $peleton->groups()->saveMany($groups);
        }

        session()->flash('status', 'Peleton aangemaakt');

        return redirect()->route('peleton.index');
    }

    /**
     * @param $peletonId
     * @return $this
     */
    public function show($peletonId)
    {
        $peleton = $this->peletonRepo->find($peletonId);

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
