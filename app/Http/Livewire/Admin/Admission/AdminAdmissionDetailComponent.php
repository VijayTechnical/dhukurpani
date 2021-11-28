<?php

namespace App\Http\Livewire\Admin\Admission;

use App\Models\Admission;
use App\Models\Course;
use Livewire\Component;

class AdminAdmissionDetailComponent extends Component
{
    public $name;
    public $gender;
    public $nationality;
    public $email;
    public $phone;
    public $location;
    public $parent_name;
    public $parent_relation;
    public $course;
    public $parent_number;
    public $gpa;
    public $school;
    public $birth;
    public $admission_id;

    public function mount($admission_id)
    {
        $this->admission_id = $admission_id;
        $admission = Admission::find($this->admission_id);
        $this->name = $admission->name;
        $this->gender = $admission->gender;
        $this->nationality = $admission->nationality;
        $this->email = $admission->email;
        $this->phone = $admission->phone;
        $this->location = $admission->location;
        $this->parent_name = $admission->parent_name;
        $this->parent_relation = $admission->parent_relation;
        $this->course = $admission->course->title;
        $this->parent_number = $admission->parent_number;
        $this->gpa = $admission->gpa;
        $this->school = $admission->school;
        $this->birth = $admission->birth;
        $this->admission_id = $admission->admission_id;

    }

    public function render()
    {
        return view('livewire.admin.admission.admin-admission-detail-component')->layout('layouts.admin');
    }
}
