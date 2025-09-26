<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\JobPosition;
use App\Models\ResumeStorage;
use App\Repositories\JobCategoryRepository;
use App\Repositories\JobLevelRepository;
use App\Repositories\JobTypeRepository;
use App\Repositories\panel\JobPositionRepository;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    protected $jobPositionRepo;
    protected $jobCategoryRepo;
    protected $jobTypeRepo;
    protected $jobLevelRepo;
    public function __construct(JobPositionRepository $jobPositionRepository, JobCategoryRepository $jobCategoryRepo, JobTypeRepository $jobTypeRepo, JobLevelRepository $jobLevelRepo)
    {
        $this->jobPositionRepo = $jobPositionRepository;
        $this->jobCategoryRepo = $jobCategoryRepo;
        $this->jobTypeRepo = $jobTypeRepo;
        $this->jobLevelRepo = $jobLevelRepo;
    }
    public function index()
    {
        $job_positions = $this->jobPositionRepo->all();
        return view("panel.job-position.index", compact("job_positions"));
    }

    public function create()
    {
        $categories = $this->jobCategoryRepo->all();
        $types = $this->jobTypeRepo->all();
        $levels = $this->jobLevelRepo->all();
        return view("panel.job-position.create", compact("categories", "types", "levels"));
    }

    public function store(Request $request)
    {
        $advertisement = $this->jobPositionRepo->store($request);
        return redirect()->route("panel.job-position.index");
    }

    public function destroy(JobPosition $jobPosition)
    {
        $jobPosition->delete();
        return redirect()->route("panel.job-position.index");
    }

    public function job_position_resumes(JobPosition $jobPosition)
    {
        $jobPositions = $this->jobPositionRepo->all();
        $resumes = $this->jobPositionRepo->resumes($jobPosition);
        return view("panel.resume-storage.index", compact("resumes", "jobPositions", "jobPosition"));
    }
}
