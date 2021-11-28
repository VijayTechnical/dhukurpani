<?php

namespace App\Http\Livewire\Admin\Course;

use App\Models\Course;
use Livewire\Component;

class AdminCourseComponent extends Component
{
    public function deleteCourse($id)
    {
        $course = Course::find($id);
        if($course->image)
        {
            unlink(storage_path('app/public/courses/'.$course->image));
        }
        $course->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $courses = Course::orderBy('created_at','DESC')->get();
        return view('livewire.admin.course.admin-course-component',['courses'=>$courses])->layout('layouts.admin');
    }
}
