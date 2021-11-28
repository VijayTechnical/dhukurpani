<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Course;
use Livewire\Component;

class CourseComponent extends Component
{
    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }
    public function render()
    {

        $courses = Course::query()
            ->Where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('title', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'DESC')->paginate($this->paginate);

        return view('livewire.course-component', ['courses' => $courses])->layout('layouts.base');
    }
}
