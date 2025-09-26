<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function all()
    {
        return User::orderBy('created_at', 'desc')->get();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function store($data)
    {

    }

    public function update($data)
    {

    }

}
