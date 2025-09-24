<?php

namespace App\Repositories;

use App\Models\Joblevel;

class JobLevelRepository
{
    public function all()
    {
        return Joblevel::all();
    }

    public function find($id)
    {
        return Joblevel::find($id);
    }

}
