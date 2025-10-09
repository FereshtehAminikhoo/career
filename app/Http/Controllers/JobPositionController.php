<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use App\Repositories\JobPositionRepository;
use App\Repositories\ResumeStorageRepository;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    protected $jobPositionRepo;
    protected $resumeStorageRepo;
    public function __construct(JobPositionRepository $jobPositionRepository, ResumeStorageRepository $resumeStorageRepository)
    {
        $this->jobPositionRepo = $jobPositionRepository;
        $this->resumeStorageRepo = $resumeStorageRepository;
    }

    public function index()
    {
        $job_positions = $this->jobPositionRepo->all();
        return view('main', compact('job_positions'));
    }

    public function show_detail(JobPosition $jobPosition)
    {
        return view("job-detail", compact("jobPosition"));
    }

    public function send_resume(JobPosition $jobPosition, Request $request)
    {
        $resume = $this->resumeStorageRepo->send_resume($jobPosition->id, $request);
        return redirect()->route('job-position.detail', $jobPosition);
    }
}
