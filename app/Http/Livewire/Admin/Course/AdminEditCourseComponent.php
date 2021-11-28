<?php

namespace App\Http\Livewire\Admin\Course;

use Carbon\Carbon;
use App\Models\Level;
use App\Models\Course;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditCourseComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $image;
    public $students;
    public $sel_teachers = [];
    public $description;
    public $level_id;
    public $course_id;
    public $newimage;

    public function mount($course_id)
    {
        $this->course_id = $course_id;
        $course = Course::find($this->course_id);
        $this->title = $course->title;
        $this->slug = $course->slug;
        $this->image = $course->image;
        $this->students = $course->students;
        $this->sel_teachers = $course->sel_teachers;
        $this->description = $course->description;
        $this->level_id = $course->level_id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $this->course_id,
            'newimage' => 'required',
            'students' => 'required',
            'sel_teachers' => 'required',
            'description' => 'required',
            'level_id' => 'required',
        ]);
    }

    public function editCourse()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $this->course_id,
            'students' => 'required',
            'sel_teachers' => 'required',
            'description' => 'required',
            'level_id' => 'required',
        ]);

        $course = Course::find($this->course_id);
        $course->title = $this->title;
        $course->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if ($course->image) {
                unlink(storage_path('app/public/courses/' . $course->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/courses', $imageName);
            $course->image = $imageName;
        } else {
            $course->image = $this->image;
        }
        $course->students = $this->students;
        $course->description = $this->description;
        $course->level_id = $this->level_id;
        $course->save();
        $course->teachers()->sync($this->sel_teachers);
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        $levels = Level::all();
        $teachers = Teacher::all();
        return view('livewire.admin.course.admin-edit-course-component',['levels'=>$levels,'teachers'=>$teachers])->layout('layouts.admin');
    }
}
