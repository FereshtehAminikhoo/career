<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Repositories\panel\JobPositionRepository;
use App\Repositories\ResumeStorageRepository;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    protected $jobPositionRepo;
    protected $resumeStorageRepo;
    protected $userRepo;

    public function __construct(JobPositionRepository $jobPositionRepository, ResumeStorageRepository $resumeStorageRepository, UserRepository $userRepository)
    {
        $this->jobPositionRepo = $jobPositionRepository;
        $this->resumeStorageRepo = $resumeStorageRepository;
        $this->userRepo = $userRepository;
    }

    public function index()
    {
        $job_positions = $this->jobPositionRepo->all();
        $resumes = $this->resumeStorageRepo->all();
        $users = $this->userRepo->all();
        return view('panel.dashboard', compact("job_positions", "resumes", "users"));
    }
}
