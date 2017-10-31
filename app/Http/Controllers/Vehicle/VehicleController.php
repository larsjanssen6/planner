<?php

namespace App\Http\Controllers\Vehicle;

use App\Domain\Category;
use App\Domain\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicles = Vehicle::with('category')->paginate(10);

        return view('vehicle.index')->with(['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('vehicle.create')->with(['categories' => $this->getCategoriesDropdown()]);
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
            'maintenance_interval' => 'required|min:1',
            'maintenance_duration' => 'required|min:1'
        ]);

        // new education from form data
        $vehicle = new Vehicle;
        $vehicle->name = $request->input('name');
        $vehicle->category_id = $request->input('category_id');
        $vehicle->maintenance_interval = $request->input('maintenance_interval');
        $vehicle->maintenance_duration = $request->input('maintenance_duration');
        $vehicle->save();

        session()->flash('status', 'Voertuig aangemaakt');

        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);

        return view('vehicle.show')->with(['vehicle' => $vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);

        return view('vehicle.edit')
            ->with(['vehicle' => $vehicle, 'categories' => $this->getCategoriesDropdown()]);
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
            'maintenance_interval' => 'required|min:1',
            'maintenance_duration' => 'required|min:1'
        ]);

        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->input('name');
        $vehicle->category_id = $request->input('category_id');
        $vehicle->maintenance_interval = $request->input('maintenance_interval');
        $vehicle->maintenance_duration = $request->input('maintenance_duration');
        $vehicle->save();

        session()->flash('status', 'Voertuig bewerkt');

        return redirect()
            ->route('vehicle.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        session()->flash('status', 'Voertuig verwijderd');

        return redirect()->route('vehicle.index');
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
}
