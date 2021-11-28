<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Facility;
use Livewire\WithPagination;

class FacilityComponent extends Component
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
        $facilities = Facility::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.facility-component',['facilities'=>$facilities])->layout('layouts.base');
    }
}
