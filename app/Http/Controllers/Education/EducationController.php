<?php

namespace App\Http\Controllers\Education;

use App\Domain\Category;
use App\Domain\Education;
use App\Domain\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $educations = Education::with('category', 'vehicle')->paginate(10);

        return view('education.index')->with(['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('education.create')->with(['categories' => $this->getCategoriesDropdown(), 'vehicles' => $this->getVehiclesDropdown()]);
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
           'name' => 'required',
           'category_id' => 'required',
           'vehicle_id' => 'required',
           'duration' => 'required|min:1',
           'required_students' => 'required|min:1',
           'required_instructors' => 'required|min:1'
        ]);

        // new education from form data
        $education = new Education;
        $education->name = $request->input('name');
        $education->category_id = $request->input('category_id');
        $education->vehicle_id = $request->input('vehicle_id');
        $education->duration = $request->input('duration');
        $education->required_students = $request->input('required_students');
        $education->required_instructors = $request->input('required_instructors');
        $education->save();

        session()->flash('status', 'Opleiding aangemaakt');

        return redirect()->route('education.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $education = Education::find($id);

        return view('education.show')->with(['education' => $education]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $education = Education::find($id);

        return view('education.edit')
            ->with(['education' => $education, 'categories' => $this->getCategoriesDropdown(), 'vehicles' => $this->getVehiclesDropdown()]);
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
            'name' => 'required',
            'category_id' => 'required',
            'vehicle_id' => 'required',
            'duration' => 'required|min:1',
            'required_students' => 'required|min:1',
            'required_instructors' => 'required|min:1'
        ]);

        $education = Education::find($id);
        $education->name = $request->input('name');
        $education->category_id = $request->input('category_id');
        $education->vehicle_id = $request->input('vehicle_id');
        $education->duration = $request->input('duration');
        $education->required_students = $request->input('required_students');
        $education->required_instructors = $request->input('required_instructors');
        $education->save();

        session()->flash('status', 'Opleiding bewerkt');

        return redirect()
            ->route('education.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();

        session()->flash('status', 'Opleiding verwijderd');

        return redirect()->route('education.index');
    }

    /**
     * returns a key => value pair of the id -> name from category model
     */
    private function getCategoriesDropdown(){
        $categories = Category::all();

        $arr = [];
        foreach ($categories as $category) {
            $arr += [ $category->id  => $category->name];
        }
        return $arr;
    }

    /**
     * returns a key => value pair of the id -> name from vehicle model
     */
    private function getVehiclesDropdown(){
        $vehicles = Vehicle::all();

        $arr = [];
        foreach ($vehicles as $vehicle) {
            $arr += [ $vehicle->id  => $vehicle->name];
        }

        return $arr;
    }
}
