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

}
