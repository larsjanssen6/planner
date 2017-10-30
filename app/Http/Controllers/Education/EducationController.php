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
        $educations = Education::with('category')->paginate(10);

        return view('education.index')->with(['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        // get key => value pair of id => name
        $arrCategories = [];
        foreach ($categories as $category) {
            $arrCategories += [ $category->id  => $category->name];
        }

        $vehicles = Vehicle::all();

        // get key => value pair of id => name
        $arrVehicles = [];
        foreach ($vehicles as $vehicle) {
            $arrVehicles += [ $vehicle->id  => $vehicle->name];
        }

        return view('education.create')->with(['categories' => $arrCategories, 'vehicles' => $arrVehicles]);
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
