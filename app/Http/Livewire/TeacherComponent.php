<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }


    public function render()
    {
        $teachers = Teacher::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('post', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('short_description', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.teacher-component',['teachers'=>$teachers])->layout('layouts.base');
    }
}
