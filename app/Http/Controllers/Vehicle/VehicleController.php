<?php

namespace App\Http\Controllers\Vehicle;

use App\Domain\Vehicle;
use App\Domain\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Repositories\Category\CategoryRepoInterface;
use App\Repositories\Vehicle\VehicleRepoInterface;

class VehicleController extends Controller
{
    /**
     * @var VehicleRepoInterface
     */
    protected $vehicleRepo;

    /**
     * @var CategoryRepoInterface
     */
    protected $categoryRepo;

    /**
     * VehicleController constructor.
     * @param VehicleRepoInterface $vehicleRepo
     * @param CategoryRepoInterface $categoryRepo
     */
    public function __construct(VehicleRepoInterface $vehicleRepo, CategoryRepoInterface $categoryRepo)
    {
        $this->vehicleRepo = $vehicleRepo;
        $this->categoryRepo = $categoryRepo;

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
            'vehicles' => $this->vehicleRepo->paginate(['category']),
        ]);
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('vehicle.create')->with(['categories' => $this->vehicleRepo->getAll()->pluck('name', 'id')]);
    }

    /**
     * @param VehicleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VehicleRequest $request)
    {
        $this->vehicleRepo->create($request->all());

        session()->flash('status', 'Voertuig aangemaakt');

        return redirect()->route('vehicle.index');
    }

    /**
     * @param $vehicleId
     * @return $this
     */
    public function show($vehicleId)
    {
        $vehicle = $this->vehicleRepo->find($vehicleId);

        return view('vehicle.show')->with(['vehicle' => $vehicle]);
    }

    /**
     * @param Vehicle $vehicle
     * @return $this
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit')->with([
            'vehicle' => $vehicle, 'categories' => $this->categoryRepo->getAll()->pluck('name', 'id'),
        ]);
    }

    /**
     * @param VehicleRequest $request
     * @param $vehicleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VehicleRequest $request, $vehicleId)
    {
        $this->vehicleRepo->update($vehicleId, $request->all());

        session()->flash('status', 'Voertuig bewerkt');

        return redirect()->route('vehicle.show', ['id' => $vehicleId]);
    }

    /**
     * @param $vehicleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($vehicleId)
    {
        $this->vehicleRepo->delete($vehicleId);

        session()->flash('status', 'Voertuig verwijderd');

        return redirect()->route('vehicle.index');
    }
}
