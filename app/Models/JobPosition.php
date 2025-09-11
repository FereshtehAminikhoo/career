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
        "title",
        "is_open",
        "description",
        "level",
        "price",
        "expired_at",
    ];
}
