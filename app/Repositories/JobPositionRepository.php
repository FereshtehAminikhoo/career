<?php

namespace App\Repositories;

use App\Models\JobPosition;

class JobPositionRepository
{
    public function all()
    {
        return JobPosition::orderBy('created_at', 'desc')->get();
    }

    public function find($id)
    {
        return JobPosition::find($id);
    }

}
