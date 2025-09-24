<?php

namespace App\Repositories;

use App\Models\JobType;

class JobTypeRepository
{
    public function all()
    {
        return JobType::all();
    }

    public function find($id)
    {
        return JobType::find($id);
    }

}
