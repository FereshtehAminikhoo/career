<?php

namespace App\Repositories\panel;

use App\Models\JobPosition;
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

}
