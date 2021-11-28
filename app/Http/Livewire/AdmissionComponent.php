<?php

namespace App\Http\Livewire;

use App\Models\Admission;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;

class AdmissionComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $location;
    public $birth;
    public $nationality;
    public $parent_name;
    public $parent_relation;
    public $parent_number;
    public $course_id;
    public $gpa;
    public $school;
    public $class;
    public $admission_slug;

    public function mount($admission_slug)
    {
        $this->admission_slug = $admission_slug;
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
            'location' => 'required',
            'birth' => 'required',
            'nationality' => 'required',
            'parent_name' => 'required',
            'parent_relation' => 'required',
            'parent_number' => 'required',
            'gpa' => 'required',
            'school' => 'required',
        ]);
    }

    public function submitAdmission()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
            'location' => 'required',
            'birth' => 'required',
            'nationality' => 'required',
            'parent_name' => 'required',
            'parent_relation' => 'required',
            'parent_number' => 'required',
            'gpa' => 'required',
            'school' => 'required',
        ]);

        $admission = new Admission();
        $admission->name = $this->name;
        $admission->email = $this->email;
        $admission->phone = $this->phone;
        $admission->gender = $this->gender;
        $admission->location = $this->location;
        $admission->birth = $this->birth;
        $admission->nationality = $this->nationality;
        $admission->parent_name = $this->parent_name;
        $admission->parent_relation = $this->parent_relation;
        $admission->parent_number = $this->parent_number;
        if($this->admission_slug == '+2')
        {
            $admission->course_id = $this->course_id;
        }
        else
        {
            $admission->class = $this->class;
        }
        $admission->gpa = $this->gpa;
        $admission->school = $this->school;
        $admission->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Form is submitted sucessfuly',
        ]);
        $this->clear();
    }

    public function clear()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->gender = '';
        $this->location = '';
        $this->birth = '';
        $this->nationality = '';
        $this->parent_name = '';
        $this->parent_relation = '';
        $this->parent_number = '';
        $this->course_id = '';
        $this->gpa = '';
        $this->school = '';
    }

    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission-component', ['courses' => $courses])->layout('layouts.base');
    }
}
