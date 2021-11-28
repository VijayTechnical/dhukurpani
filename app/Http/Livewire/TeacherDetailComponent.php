<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class TeacherDetailComponent extends Component
{
    public $teacher_slug;
    public $teacher_name;

    public function mount($teacher_slug)
    {
        $this->teacher_slug = $teacher_slug;
        $teacher = Teacher::where('slug',$this->teacher_slug)->first();
        $this->teacher_name = $teacher->name;
    }


    public function render()
    {
        $teacher = Teacher::where('slug',$this->teacher_slug)->first();
        return view('livewire.teacher-detail-component',['teacher'=>$teacher])->layout('layouts.base');
    }
}
