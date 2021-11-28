<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Event;
use Livewire\Component;

class AdminEventComponent extends Component
{

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        if($event->image)
        {
            unlink(storage_path('app/public/events/'.$event->image));
        }
        $event->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $events = Event::orderBy('created_at','DESC')->get();
        return view('livewire.admin.event.admin-event-component',['events'=>$events])->layout('layouts.admin');
    }
}
