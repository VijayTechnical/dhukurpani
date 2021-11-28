<?php

namespace App\Http\Livewire\Admin\Event;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddEventComponent extends Component
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


    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required|unique:events',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
            'time' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);
    }

    public function addEvent()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:events',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
            'time' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);

        $event = new Event();
        $event->title = $this->title;
        $event->slug = $this->slug;
        $event->description = $this->description;
        $event->start_date = $this->start_date;
        $event->end_date = $this->end_date;
        $event->color = $this->color;
        $event->time = $this->time;
        $event->location = $this->location;
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('public/events',$imageName);
        $event->image = $imageName;
        $event->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.event.admin-add-event-component')->layout('layouts.admin');
    }
}
