<?php

namespace App\Http\Livewire\Admin\Facility;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Facility;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditFacilityComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $description;
    public $image;
    public $newimage;
    public $facility_id;


    public function mount($facility_id)
    {
        $this->facility_id = $facility_id;
        $facility = Facility::find($this->facility_id);
        $this->name = $facility->name;
        $this->slug = $facility->slug;
        $this->image = $facility->image;
        $this->description = $facility->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:facilities,slug,'.$this->facility_id,
            'description' => 'required',
            'newimage' => 'required|mimes:png,jpg',
        ]);
    }

    public function editFacility()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:facilities,slug,'.$this->facility_id,
            'description' => 'required',
        ]);

        $facility = Facility::find($this->facility_id);
        $facility->name = $this->name;
        $facility->slug = $this->slug;
        $facility->description = $this->description;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($facility->image)
            {
                unlink(storage_path('app/public/facilities/'.$facility->image));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/facilities', $imageName);
            $facility->image = $imageName;
        }
        else
        {
            $facility->image = $this->image;
        }
        $facility->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.facility.admin-edit-facility-component')->layout('layouts.admin');
    }
}
