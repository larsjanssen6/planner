<?php

namespace App\Http\Controllers\Education;

use App\Domain\Vehicle;
use App\Domain\Category;
use App\Domain\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    /**
     * Show all educations.
     *
     * @return $this
     */
    public function index()
    {
        return view('education.index')->with([
            'educations' => Education::with('category', 'vehicles')->paginate(10)
        ]);
    }

    /**
     * Show education create form.
     *
     * @return $this
     */
    public function create()
    {
        return view('education.create')->with([
            'categories' => Category::all()->pluck('name', 'id'),
            'vehicles' => Vehicle::all()
        ]);
    }

    /**
     * Store education.
     *
     * @param EducationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EducationRequest $request)
    {
        $eduction = Education::create($request->all());

        $eduction->vehicles()->sync($request->vehicles);

        session()->flash('status', 'Opleiding aangemaakt');

        return redirect()->route('education.index');
    }

    /**
     * Show education.
     *
     * @param Education $education
     * @return $this
     */
    public function show(Education $education)
    {
        return view('education.show')->with(['education' => $education]);
    }


    /**
     * Show edit form education.
     *
     * @param Education $education
     * @return $this
     */
    public function edit(Education $education)
    {
        return view('education.edit')->with([
                'education' => $education,
                'categories' => Category::all()->pluck('name', 'id'),
                'vehicles' => Vehicle::all()
            ]);
    }

    /**
     * Update education.
     *
     * @param EducationRequest $request
     * @param Education $education
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EducationRequest $request, Education $education)
    {
        $education->update($request->all());

        $education->vehicles()->sync($request->vehicles);

        session()->flash('status', 'Opleiding bewerkt');

        return redirect()->route('education.show', ['id' => $education->id]);
    }

    /**
     * Destroy education.
     *
     * @param Education $education
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Education $education)
    {
        $education->delete();

        session()->flash('status', 'Opleiding verwijderd');

        return redirect()->route('education.index');
    }
}
