<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function all()
    {
        return User::orderBy("created_at", "desc")->get();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function store($data)
    {
        return User::create([
            "user_type_id" => $data->user_type,
            "name" => $data->name,
            "email" => $data->email,
            "password" => Hash::make($data->password),
        ]);
    }

    public function update($id, $data)
    {
        $user = $this->find($id);
        return $user->update([
            "user_type_id" => $data->user_type,
            "name" => $data->name,
            "email" => $data->email,
            "password" => Hash::make($data->password),
        ]);
    }

}
