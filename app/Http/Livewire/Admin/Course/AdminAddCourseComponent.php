<?php

namespace App\Http\Livewire\Admin\Course;

use Carbon\Carbon;
use App\Models\Level;
use App\Models\Course;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddCourseComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $image;
    public $students;
    public $sel_teachers = [];
    public $description;
    public $level_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'students' => 'required',
            'sel_teachers' => 'required',
            'description' => 'required',
            'level_id' => 'required',
        ]);
    }

    public function addCourse()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'students' => 'required',
            'sel_teachers' => 'required',
            'description' => 'required',
            'level_id' => 'required',
        ]);

        $course = new Course();
        $course->title = $this->title;
        $course->slug = $this->slug;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('public/courses', $imageName);
        $course->image = $imageName;
        $course->students = $this->students;
        $course->description = $this->description;
        $course->level_id = $this->level_id;
        $course->save();
        $course->teachers()->sync($this->sel_teachers);
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);

    }

    public function render()
    {
        $levels = Level::all();
        $teachers = Teacher::all();
        return view('livewire.admin.course.admin-add-course-component',['levels'=>$levels,'teachers'=>$teachers])->layout('layouts.admin');
    }
}
