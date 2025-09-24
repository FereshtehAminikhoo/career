<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPosition extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "category_id",
        "user_id",
        "level_id",
        "title",
        "is_open",
        "description",
        "skills",
        "price",
        "expired_at",
    ];
}
