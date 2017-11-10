<?php

namespace App\Http\Controllers\Vehicle;

use App\Domain\Vehicle;
use App\Domain\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    /**
     * VehicleController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:show-vehicle')->only('show');
        $this->middleware('permission:create-vehicle')->only('create', 'store');
        $this->middleware('permission:edit-vehicle')->only('edit', 'update');
        $this->middleware('permission:delete-vehicle')->only('destroy');
    }

    /**
     * @return $this
     */
    public function index()
    {
        return view('vehicle.index')->with([
            'vehicles' => Vehicle::with('category')->paginate(10),
        ]);
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('vehicle.create')->with(['categories' => Category::all()->pluck('name', 'id')]);
    }

    /**
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
     * @param Vehicle $vehicle
     * @return $this
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicle.show')->with(['vehicle' => $vehicle]);
    }

    /**
     * @param Vehicle $vehicle
     * @return $this
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit')->with([
            'vehicle' => $vehicle, 'categories' => Category::all()->pluck('name', 'id'),
        ]);
    }

    /**
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
