<?php

namespace App\Repositories;

use App\Models\ResumeStorage;

class ResumeStorageRepository
{
    public function all()
    {
        return ResumeStorage::all();
    }

    public function find($id)
    {
        return ResumeStorage::find($id);
    }

    public function send_resume($id, $data)
    {
        return ResumeStorage::create([
            "job_position_id" => $id,
            "status_id" => 1,
            "first_name" => $data->first_name,
            "last_name" => $data->last_name,
            "email" => $data->email,
            "mobile" => $data->phone,
            "file_path" => $data->file,
        ]);
    }

}
