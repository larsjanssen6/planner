<?php

namespace App\Http\Controllers\Vehicle;

use App\Domain\Vehicle;
use App\Domain\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    /**
     * Show all vehicles.
     *
     * @return $this
     */
    public function index()
    {
        return view('vehicle.index')->with([
            'vehicles' => Vehicle::with('category')->paginate(10)
        ]);
    }

    /**
     * Show vehicle create form.
     *
     * @return $this
     */
    public function create()
    {
        return view('vehicle.create')->with(['categories' => Category::all()->pluck('name', 'id')]);
    }

    /**
     * Store vehicle.
     *
     * @param VehicleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VehicleRequest $request)
    {
        Vehicle::create($request->all());

        session()->flash('status', 'Voertuig aangemaakt');

        return redirect()->route('vehicle.index');
    }

    /**
     * Show vehicle.
     *
     * @param Vehicle $vehicle
     * @return $this
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicle.show')->with(['vehicle' => $vehicle]);
    }

    /**
     * Show edit form vehicle.
     *
     * @param Vehicle $vehicle
     * @return $this
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit')->with([
            'vehicle' => $vehicle, 'categories' => Category::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Update vehicle.
     *
     * @param VehicleRequest $request
     * @param Vehicle $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

        session()->flash('status', 'Voertuig bewerkt');

        return redirect()->route('vehicle.show', ['id' => $vehicle->id]);
    }

    /**
     * Destroy vehicle.
     *
     * @param Vehicle $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        session()->flash('status', 'Voertuig verwijderd');

        return redirect()->route('vehicle.index');
    }
}
