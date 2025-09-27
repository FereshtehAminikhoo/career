<?php

namespace App\Repositories;

use App\Models\Status;

class StatusRepository
{
    public function all()
    {
        return Status::all();
    }

    public function find($id)
    {
        return Status::find($id);
    }

}
