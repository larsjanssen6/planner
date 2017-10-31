<?php

namespace App\Http\Controllers\Peleton;

use App\Domain\Peleton;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeletonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $peletons = Peleton::paginate(10);

        return view('peleton.index')->with(['peletons' => $peletons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('peleton.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        // new education from form data
        $peleton = new Peleton;
        $peleton->name = $request->input('name');
        $peleton->save();

        session()->flash('status', 'Peleton aangemaakt');

        return redirect()->route('peleton.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $peleton = Peleton::find($id);

        return view('peleton.show')->with(['peleton' => $peleton]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $peleton = Peleton::find($id);

        return view('peleton.edit')->with(['peleton' => $peleton]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $peleton = Peleton::find($id);
        $peleton->name = $request->input('name');
        $peleton->save();

        session()->flash('status', 'Peleton bewerkt');

        return redirect()
            ->route('peleton.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peleton = Peleton::find($id);
        $peleton->delete();

        session()->flash('status', 'Peleton verwijderd');

        return redirect()->route('peleton.index');
    }
}
