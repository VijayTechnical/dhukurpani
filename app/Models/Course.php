<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_courses');
    }

    public function level()
    {
        return $this->belongsTo(Level::class,'level_id');
    }
}
