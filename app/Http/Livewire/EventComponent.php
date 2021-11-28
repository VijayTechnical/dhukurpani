<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventComponent extends Component
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
        $events = Event::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('title', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('location', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('start_date', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('end_date', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('time', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.event-component',['events'=>$events])->layout('layouts.base');
    }
}
