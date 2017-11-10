<?php

namespace App\Http\Controllers\Vehicle;

use App\Domain\Vehicle;
use App\Domain\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show-vehicle')->only('show');
        $this->middleware('permission:create-vehicle')->only('create', 'store');
        $this->middleware('permission:edit-vehicle')->only('edit', 'update');
        $this->middleware('permission:delete-vehicle')->only('destroy');
    }

    public function index()
    {
        return view('vehicle.index')->with([
            'vehicles' => Vehicle::with('category')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('vehicle.create')->with(['categories' => Category::all()->pluck('name', 'id')]);
    }

    public function store(VehicleRequest $request)
    {
        Vehicle::create($request->all());

        session()->flash('status', 'Voertuig aangemaakt');

        return redirect()->route('vehicle.index');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicle.show')->with(['vehicle' => $vehicle]);
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit')->with([
            'vehicle' => $vehicle, 'categories' => Category::all()->pluck('name', 'id'),
        ]);
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

        session()->flash('status', 'Voertuig bewerkt');

        return redirect()->route('vehicle.show', ['id' => $vehicle->id]);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        session()->flash('status', 'Voertuig verwijderd');

        return redirect()->route('vehicle.index');
    }
}
