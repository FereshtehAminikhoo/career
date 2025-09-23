<?php

namespace App\Repositories;

use App\Models\JobPosition;

class AdvertisementRepository
{
    public function all()
    {
        return JobPosition::orderBy('created_at', 'desc')->get();
    }

    public function find($id)
    {
        return JobPosition::find($id);
    }

    public function store($data)
    {
        return JobPosition::create([
            "category_id" => $data->category,
            "user_id" => ,
            "title" => $data->title,
            "is_open" => 1,
            "description" => ,
            "level" => ,
            "price" => ,
            "expired_at" =>
        ]);
    }

}
