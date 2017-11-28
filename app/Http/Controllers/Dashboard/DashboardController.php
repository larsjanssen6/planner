<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Education\EducationRepoInterface;
use App\Repositories\Group\GroupRepoInterface;
use App\Repositories\Peleton\PeletonRepoInterface;
use App\Repositories\User\UserRepoInterface;
use App\Repositories\Vehicle\VehicleRepoInterface;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * @var EducationRepoInterface
     */
    private $educationRepo;
    /**
     * @var GroupRepoInterface
     */
    private $groupRepo;

    /**
     * @var
     */
    private $peletonRepo;

    /**
     * @var
     */
    private $vehicleRepo;

    /**
     * @var
     */
    private $userRepo;

    /**
     * DashboardController constructor.
     * @param EducationRepoInterface $educationRepo
     * @param GroupRepoInterface $groupRepo
     * @param PeletonRepoInterface $peletonRepo
     * @param VehicleRepoInterface $vehicleRepo
     * @param UserRepoInterface $userRepo
     */
    public function __construct(EducationRepoInterface $educationRepo,
                                GroupRepoInterface $groupRepo,
                                PeletonRepoInterface $peletonRepo,
                                VehicleRepoInterface $vehicleRepo,
                                UserRepoInterface $userRepo)
    {
        $this->middleware('permission:show-dashboard')->only('index');

        $this->educationRepo = $educationRepo;
        $this->groupRepo = $groupRepo;
        $this->peletonRepo = $peletonRepo;
        $this->vehicleRepo = $vehicleRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $educations = $this->educationRepo->getAll();
        $groups = $this->groupRepo->getAll();
        $peletons = $this->peletonRepo->getAll();
        $vehicles = $this->vehicleRepo->getAll();
        $users = $this->userRepo->getAll();

        return view('dashboard.index')->with([

            /*
             * Educations
             */

            'total_educations' => $educations->count(),
            'educations_latest' => $educations->last(),
            'educations_total_last_month'    => $educations->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth())
                ->where('created_at', '<=', Carbon::now()->startOfMonth())->count(),
            'educations_total_current_month' => $educations->where('created_at', '>=', Carbon::now()->startOfMonth())->count(),

            /*
             * Groups
             */

            'total_groups' => $groups->count(),
            'groups_latest' => $groups->last(),
            'groups_total_last_month'    => $groups->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth())
                ->where('created_at', '<=', Carbon::now()->startOfMonth())->count(),
            'groups_total_current_month' => $groups->where('created_at', '>=', Carbon::now()->startOfMonth())->count(),

            /*
            * Peletons
            */

            'total_peletons' => $peletons->count(),
            'peletons_latest' => $peletons->last(),
            'peletons_total_last_month'    => $peletons->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth())
                ->where('created_at', '<=', Carbon::now()->startOfMonth())->count(),
            'peletons_total_current_month' => $peletons->where('created_at', '>=', Carbon::now()->startOfMonth())->count(),

            /*
           * Peletons
           */

            'total_vehicles' => $vehicles->count(),
            'vehicles_latest' => $vehicles->last(),
            'vehicles_total_last_month'    => $vehicles->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth())
                ->where('created_at', '<=', Carbon::now()->startOfMonth())->count(),
            'vehicles_total_current_month' => $vehicles->where('created_at', '>=', Carbon::now()->startOfMonth())->count(),

            'users_total'   => $users->count(),
            'users_latest'  => $users->last(),
        ]);
    }
}
