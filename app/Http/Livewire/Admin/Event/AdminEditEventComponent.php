<?php

namespace App\Http\Livewire\Admin\Event;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditEventComponent extends Component
{
    use WithFileUploads;


    public $title;
    public $slug;
    public $description;
    public $start_date;
    public $end_date;
    public $color;
    public $time;
    public $location;
    public $image;
    public $event_id;
    public $newimage;


    public function mount($event_id)
    {
        $this->event_id = $event_id;
        $event = Event::find($this->event_id);
        $this->title = $event->title;
        $this->slug = $event->slug;
        $this->description = $event->description;
        $this->start_date = $event->start_date;
        $this->end_date = $event->end_date;
        $this->color = $event->color;
        $this->time = $event->time;
        $this->location = $event->location;
        $this->image = $event->image;

    }


    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required|unique:events,slug,'.$this->event_id,
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
            'time' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);
    }

    public function editEvent()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:events,slug,'.$this->event_id,
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
            'time' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);

        $event = Event::find($this->event_id);
        $event->title = $this->title;
        $event->slug = $this->slug;
        $event->description = $this->description;
        $event->start_date = $this->start_date;
        $event->end_date = $this->end_date;
        $event->color = $this->color;
        $event->time = $this->time;
        $event->location = $this->location;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($event->image)
            {
                unlink(storage_path('app/public/events/'.$event->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/events', $imageName);
            $event->image = $imageName;
        }
        else
        {
            $event->image = $this->image;
        }
        $event->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.event.admin-edit-event-component')->layout('layouts.admin');
    }
}
