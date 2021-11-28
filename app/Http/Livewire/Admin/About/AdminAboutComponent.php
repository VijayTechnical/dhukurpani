<?php

namespace App\Http\Livewire\Admin\About;

use Carbon\Carbon;
use App\Models\About;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAboutComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $logo1;
    public $logo2;
    public $newlogo1;
    public $newlogo2;
    public $short_description;
    public $description;
    public $image;
    public $feature;
    public $mission;
    public $vision;
    public $email;
    public $phone;
    public $location;
    public $facebook;
    public $instagram;
    public $twitter;
    public $youtube;
    public $newimage;


    public function mount()
    {
        $about = About::find(1);
        if ($about) {
            $this->name = $about->name;
            $this->logo1 = $about->logo1;
            $this->logo2 = $about->logo2;
            $this->short_description = $about->short_description;
            $this->description = $about->description;
            $this->image = $about->image;
            $this->feature = $about->feature;
            $this->mission = $about->mission;
            $this->vision = $about->vision;
            $this->email = $about->email;
            $this->phone = $about->phone;
            $this->location = $about->location;
            $this->facebook = $about->facebook;
            $this->instagram = $about->instagram;
            $this->twitter = $about->twitter;
            $this->youtube = $about->youtube;
        }
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'logo1' => 'required|mimes:png,jpg',
            'logo2' => 'required|mimes:png,jpg',
            'short_description' => 'required',
            'description' => 'required',
            'newimage' => 'required|mimes:png,jpg',
            'feature' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
        ]);
    }

    public function updateAbout()
    {
        $this->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'feature' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
        ]);

        $about = About::find(1);
        if ($about) {
            $about->name = $this->name;
            if ($this->newlogo1) {
                $this->validate([
                    'newlogo1' => 'required|mimes:png,jpg'
                ]);
                if ($about->logo1) {
                    unlink(storage_path('app/public/logos/' . $about->logo1));
                }
                $logo1Name = Carbon::now()->timestamp . '.' . $this->newlogo1->extension();
                $this->newlogo1->storeAS('public/logos', $logo1Name);
                $about->logo1 = $logo1Name;
            } else {
                $about->logo1 = $this->logo1;
            }
            if ($this->newlogo2) {
                $this->validate([
                    'newlogo2' => 'required|mimes:png,jpg'
                ]);
                if ($about->logo2) {
                    unlink(storage_path('app/public/logos/' . $about->logo2));
                }
                $logo2Name = Carbon::now()->timestamp . '.' . $this->newlogo2->extension();
                $this->newlogo2->storeAS('public/logos', $logo2Name);
                $about->logo2 = $logo2Name;
            } else {
                $about->logo2 = $this->logo2;
            }
            $about->short_description = $this->short_description;
            $about->description = $this->description;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($about->image) {
                    unlink(storage_path('app/public/abouts/' . $about->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/abouts', $imageName);
                $about->image = $imageName;
            } else {
                $about->image = $this->image;
            }
            $about->feature = $this->feature;
            $about->mission = $this->mission;
            $about->vision = $this->vision;
            $about->email = $this->email;
            $about->phone = $this->phone;
            $about->location = $this->location;
            $about->facebook = $this->facebook;
            $about->instagram = $this->instagram;
            $about->twitter = $this->twitter;
            $about->youtube = $this->youtube;
            $about->save();
        } else {
            $about = new About();
            $about->name = $this->name;
            $about->short_description = $this->short_description;
            $about->description = $this->description;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($about->image) {
                    unlink(storage_path('app/public/abouts/' . $about->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/abouts', $imageName);
                $about->image = $imageName;
            } else {
                $about->image = $this->image;
            }
            $about->feature = $this->feature;
            $about->mission = $this->mission;
            $about->vision = $this->vision;
            $about->email = $this->email;
            $about->phone = $this->phone;
            $about->location = $this->location;
            $about->facebook = $this->facebook;
            $about->instagram = $this->instagram;
            $about->twitter = $this->twitter;
            $about->youtube = $this->youtube;
            $about->save();
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.about.admin-about-component')->layout('layouts.admin');
    }
}
