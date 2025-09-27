<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResumeScore extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "user_id",
        "status_id",
        "resume_storage_id",
        "description",
        "score",
    ];

    public function score()
    {
        return $this->belongsTo(ResumeStorage::class, "resume_storage_id", "id");
    }
}
