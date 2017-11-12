<?php

namespace App\Http\Controllers\Education;

use App\Domain\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Repositories\Vehicle\VehicleRepoInterface;
use App\Repositories\Category\CategoryRepoInterface;
use App\Repositories\Education\EducationRepoInterface;

class EducationController extends Controller
{
    /**
     * @var EducationRepoInterface
     */
    protected $educationRepo;

    /**
     * @var
     */
    protected $vehicleRepo;

    /**
     * @var CategoryRepoInterface
     */
    protected $categoryRepo;

    /**
     * EducationController constructor.
     * @param EducationRepoInterface $educationRepo
     * @param VehicleRepoInterface $vehicleRepo
     */
    public function __construct(EducationRepoInterface $educationRepo, VehicleRepoInterface $vehicleRepo, CategoryRepoInterface $categoryRepo)
    {
        $this->educationRepo = $educationRepo;
        $this->vehicleRepo = $vehicleRepo;
        $this->categoryRepo = $categoryRepo;

        $this->middleware('permission:show-education')->only('show');
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
            'educations' => $this->educationRepo->paginate(['category', 'vehicles']),
        ]);
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('education.create')->with([
            'categories' => $this->categoryRepo->getAll()->pluck('name', 'id'),
            'vehicles' => $this->vehicleRepo->getAll(),
        ]);
    }

    /**
     * @param EducationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EducationRequest $request)
    {
        $eduction = $this->educationRepo->create($request->all());

        $eduction->vehicles()->sync($request->vehicles);

        session()->flash('status', 'Opleiding aangemaakt');

        return redirect()->route('education.index');
    }

    /**
     * @param $educationId
     * @return $this
     */
    public function show($educationId)
    {
        $education = $this->educationRepo->find($educationId);

        return view('education.show')->with(['education' => $education]);
    }

    /**
     * @param $educationId
     * @return $this
     */
    public function edit($educationId)
    {
        $education = $this->educationRepo->find($educationId);

        return view('education.edit')->with([
                'education' => $education,
                'categories' => $this->categoryRepo->getAll()->pluck('name', 'id'),
                'vehicles' => $this->vehicleRepo->getAll(),
            ]);
    }

    /**
     * @param EducationRequest $request
     * @param $educationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EducationRequest $request, $educationId)
    {
        $education = $this->educationRepo->update($educationId, $request->all());

        $education->vehicles()->sync($request->vehicles);

        session()->flash('status', 'Opleiding bewerkt');

        return redirect()->route('education.show', ['id' => $education->id]);
    }

    /**
     * @param $educationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($educationId)
    {
        $this->educationRepo->delete($educationId);

        session()->flash('status', 'Opleiding verwijderd');

        return redirect()->route('education.index');
    }
}
