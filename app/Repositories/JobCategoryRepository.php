<?php

namespace App\Repositories;

use App\Models\JobCategory;

class JobCategoryRepository
{
    public function all()
    {
        return JobCategory::all();
    }

    public function find($id)
    {
        return JobCategory::find($id);
    }

}
