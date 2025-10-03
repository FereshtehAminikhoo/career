<?php

namespace App\Repositories\panel;

use App\Models\JobPosition;
use App\Models\ResumeScore;
use App\Models\ResumeStorage;

class JobPositionRepository
{
    public function all()
    {
        return JobPosition::orderBy('created_at', 'desc')->get();
    }

    public function find($id)
    {
        return JobPosition::findOrFail($id);
    }

    public function store($data)
    {
        return JobPosition::create([
            "category_id" => $data->category,
            "user_id" => 1,
            "level_id" => $data->level,
            "type_id" => $data->type,
            "title" => $data->title,
            "is_open" => 1,
            "description" => $data->description,
            "skills" => $data->skills,
            "price" => $data->salary,
            "location" => $data->location,
            "expired_at" => $data->deadline
        ]);
    }

    public function resumes($id)
    {
        return ResumeStorage::where('job_position_id', $id)->get();
    }

    public function resume($id)
    {
        return ResumeStorage::where('id', $id)->first();
    }

    public function submit_score($data)
    {
        return ResumeScore::create([
            "user_id" => 1,
            "status_id" => $data->status,
            "resume_storage_id" => $data->resume_id,
            "description" => $data->comments,
            "score" => $data->score,
        ]);
    }

    public function update_resume_status($data, $id)
    {
        $resume = ResumeStorage::where('id', $id)->first();
        $resume->update([
            "status_id" => $data->status,
        ]);
        return $resume;
    }

    public function scores($id)
    {
        return ResumeScore::where("resume_storage_id", $id)->with(['user', 'status'])->get();
    }
}
