<?php

namespace App\Http\Controllers\Peleton;

use App\Domain\Group;
use App\Domain\Peleton;
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
        return view('peleton.create')->with(['groups' => Group::all()]);
    }

    /**
     * Store peleton.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Peleton::create($request->all());

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
        return view('peleton.show')->with(['peleton' => $peleton]);
    }

    /**
     * Show edit peleton form.
     *
     * @param Peleton $peleton
     * @return $this
     */
    public function edit(Peleton $peleton)
    {
        return view('peleton.edit')->with(['peleton' => $peleton]);
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

        $peleton->update($request->all());

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
        $peleton->delete();

        session()->flash('status', 'Peleton verwijderd');

        return redirect()->route('peleton.index');
    }
}
