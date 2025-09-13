<?php

namespace App\Http\Controllers;

use App\Repositories\JobPositionRepository;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    protected $jobPositionRepo;
    public function __construct(JobPositionRepository $jobPositionRepository)
    {
        $this->jobPositionRepo = $jobPositionRepository;
    }
    public function show()
    {
        $job_positions = $this->jobPositionRepo->all();
        return view('main', compact('job_positions'));
    }
}
