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

    public function job_position()
    {
        return $this->belongsTo(JobPosition::class, "job_position_id", "id");
    }

    public function status()
    {
        return $this->belongsTo(Status::class, "status_id", "id");
    }
}
