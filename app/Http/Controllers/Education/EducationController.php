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
     * EducationController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:show-education')->only('index');
        $this->middleware('permission:create-education')->only('create', 'store');
        $this->middleware('permission:edit-education')->only('edit', 'update');
        $this->middleware('permission:delete-education')->only('destroy');
    }

    /**
     * @return $this
     */
    public function index()
    {
        return view('education.index')->with([
            'educations' => Education::with('category', 'vehicles')->paginate(10),
        ]);
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('education.create')->with([
            'categories' => Category::all()->pluck('name', 'id'),
            'vehicles' => Vehicle::all(),
        ]);
    }

    /**
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
     * @param Education $education
     * @return $this
     */
    public function show(Education $education)
    {
        return view('education.show')->with(['education' => $education]);
    }

    /**
     * @param Education $education
     * @return $this
     */
    public function edit(Education $education)
    {
        return view('education.edit')->with([
                'education' => $education,
                'categories' => Category::all()->pluck('name', 'id'),
                'vehicles' => Vehicle::all(),
            ]);
    }

    /**
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
