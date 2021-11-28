<?php

namespace App\Http\Livewire\Admin\Facility;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Facility;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddFacilityComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $description;
    public $image;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:facilities',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);
    }

    public function addFacility()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:facilities',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);

        $facility = new Facility();
        $facility->name = $this->name;
        $facility->slug = $this->slug;
        $facility->description = $this->description;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('public/facilities', $imageName);
        $facility->image = $imageName;
        $facility->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.facility.admin-add-facility-component')->layout('layouts.admin');
    }
}
