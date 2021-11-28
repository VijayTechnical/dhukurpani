<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventDetailComponent extends Component
{
    public $event_slug;
    public $title;

    public function mount($event_slug)
    {
        $this->event_slug = $event_slug;
        $event = Event::where('slug',$this->event_slug)->first();
        $this->title = $event->title;
    }


    public function render()
    {
        $event = Event::where('slug',$this->event_slug)->first();
        return view('livewire.event-detail-component',['event'=>$event])->layout('layouts.base');
    }
}
