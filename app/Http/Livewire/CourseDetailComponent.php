<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Course;
use Livewire\Component;

class CourseDetailComponent extends Component
{
    public $level_id;
    public $course_slug;
    public $course_title;

    public function mount($course_slug)
    {
        $this->course_slug = $course_slug;
        $course = Course::where('slug',$this->course_slug)->first();
        $this->course_title = $course->title;
        $this->level_id = $course->level_id;
    }


    public function render()
    {
        $course = Course::where('slug',$this->course_slug)->first();
        $levels = Level::orderBy('created_at','DESC')->limit(5)->get();
        $related_courses = Course::where('level_id',$this->level_id)->limit(3)->get();
        return view('livewire.course-detail-component',['course'=>$course,'levels'=>$levels,'related_courses'=>$related_courses])->layout('layouts.base');
    }
}
