<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\JobPosition;
use App\Models\ResumeScore;
use App\Models\ResumeStorage;
use App\Repositories\JobCategoryRepository;
use App\Repositories\JobLevelRepository;
use App\Repositories\JobTypeRepository;
use App\Repositories\panel\JobPositionRepository;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    protected $jobPositionRepo;
    protected $jobCategoryRepo;
    protected $jobTypeRepo;
    protected $jobLevelRepo;
    protected $statusRepo;

    public function __construct(JobPositionRepository $jobPositionRepository, JobCategoryRepository $jobCategoryRepository, JobTypeRepository $jobTypeRepository, JobLevelRepository $jobLevelRepository, StatusRepository $statusRepository)
    {
        $this->jobPositionRepo = $jobPositionRepository;
        $this->jobCategoryRepo = $jobCategoryRepository;
        $this->jobTypeRepo = $jobTypeRepository;
        $this->jobLevelRepo = $jobLevelRepository;
        $this->statusRepo = $statusRepository;
    }
    public function index()
    {
        $job_positions = $this->jobPositionRepo->all();
        return view('panel.job-position.index', compact("job_positions"));
    }

    public function create()
    {
        $categories = $this->jobCategoryRepo->all();
        $types = $this->jobTypeRepo->all();
        $levels = $this->jobLevelRepo->all();
        return view('panel.job-position.create', compact("categories", "types", "levels"));
    }

    public function store(Request $request)
    {
        $advertisement = $this->jobPositionRepo->store($request);
        return redirect()->route('panel.job-position.index');
    }

    public function edit(JobPosition $jobPosition)
    {
        return view("panel.job-position.edit", compact("jobPosition"));
    }

    public function update(JobPosition $jobPosition, Request $request)
    {

    }

    public function destroy(JobPosition $jobPosition)
    {
        $jobPosition->delete();
        return redirect()->route('panel.job-position.index');
    }

    public function job_position_resumes(JobPosition $jobPosition)
    {
        $jobPositions = $this->jobPositionRepo->all();
        $resumes = $this->jobPositionRepo->resumes($jobPosition->id);
        return view('panel.resumeStorage.index', compact("resumes", "jobPositions", "jobPosition"));
    }

    public function job_position_resume_detail(JobPosition $jobPosition, ResumeStorage $resumeStorage)
    {
        $resumes = $this->jobPositionRepo->resumes($jobPosition->id);
        foreach ($resumes as $resume){
            $resume_info = $this->jobPositionRepo->resume($resume->id);
        }
        $statuses = $this->statusRepo->all();
        return view("panel.resumeStorage.detail", compact("jobPosition", "resumeStorage", "resume_info", "statuses"));
    }

    public function submit_score(JobPosition $jobPosition, ResumeStorage $resumeStorage, Request $request)
    {
        $resume_score = $this->jobPositionRepo->submit_score($request);
        $update_status = $this->jobPositionRepo->update_resume_status($request, $resumeStorage->id);
        return redirect()->route('panel.job-position.resumes', $jobPosition);
    }

    public function score_logs(JobPosition $jobPosition, ResumeStorage $resumeStorage)
    {
        $resume_scores = $this->jobPositionRepo->scores($resumeStorage->id);
        return response()->json([
            "job_position" => $jobPosition,
            "resume_storage" => $resumeStorage,
            "resume_scores" => $resume_scores
        ]);

    }
}
