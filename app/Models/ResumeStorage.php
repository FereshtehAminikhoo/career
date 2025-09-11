<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResumeStorage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "job_position_id",
        "status_id",
        "first_name",
        "last_name",
        "email",
        "mobile",
        "file_path",
    ];
}
