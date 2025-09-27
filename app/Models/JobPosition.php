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
        "type_id",
        "title",
        "is_open",
        "description",
        "skills",
        "price",
        "location",
        "expired_at",
    ];

    public function category()
    {
        return $this->belongsTo(JobCategory::class, "category_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function level()
    {
        return $this->belongsTo(JobLevel::class, "level_id", "id");
    }

    public function type()
    {
        return $this->belongsTo(JobType::class, "type_id", "id");
    }

    public function resumes()
    {
        return $this->hasMany(ResumeStorage::class, 'job_position_id', 'id');
    }
}
