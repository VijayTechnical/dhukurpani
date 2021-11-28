<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course','teacher_courses');
    }
}
